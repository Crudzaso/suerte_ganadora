<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;
use App\Events\UserCreated;
use App\Events\UserUpdated;
use App\Events\UserDeleted;
use App\Events\UserRestore;
use OwenIt\Auditing\Models\Audit;
use Spatie\Permission\Models\Role;


class UserCrud extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $roles; // Para almacenar los roles
    public $selectedRole; // Para almacenar el rol seleccionado
    public $name, $email, $password, $user_id;
    public $isEditMode = false;
    public $selectedUser;
    public $audits;
    public $showingDetails = false;
    public $showingCreateForm = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
    ];

    public function mount()
    {
        // Cargar todos los roles disponibles
        $this->roles = Role::all();
    }

    public function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->user_id = null;
        $this->isEditMode = false;
    }

    public function store()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        // Asignar el rol seleccionado
        if ($this->selectedRole) {
            $user->assignRole($this->selectedRole);
        }

        event(new UserCreated($user)); // Disparar el evento

        session()->flash('message', 'Usuario creado exitosamente.');
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $this->isEditMode = true;
        $user = User::findOrFail($id);


        $this->user_id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->password = '';

        // Abrir el modal de creación de usuario
        $this->showingCreateForm = true;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $this->user_id,
        ]);

        $user = User::findOrFail($this->user_id);
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password ? Hash::make($this->password) : $user->password,
        ]);

        // Asignar el rol seleccionado
        if ($this->selectedRole) {
            $user->syncRoles($this->selectedRole);  // syncRoles es mejor para actualizar el rol
        }

        event(new UserUpdated($user)); // Disparar el evento

        session()->flash('message', 'Usuario actualizado exitosamente.');
        $this->resetInputFields();
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        event(new UserDeleted($user));

        session()->flash('message', 'Usuario eliminado exitosamente.');
    }

    public function showDetails($userId)
    {
        $this->selectedUser = User::find($userId);

        // Obtener la auditoría relacionada con este usuario
        $this->audits = Audit::where('auditable_type', User::class)
            ->where('auditable_id', $userId)
            ->get();

        // Parsear las auditorías
        $this->audits->each(function ($audit) {
            $audit->old_values = $this->parseAuditValues($audit->old_values);
            $audit->new_values = $this->parseAuditValues($audit->new_values);
        });

        $this->showingDetails = true;
    }
    // Método para parsear valores de auditoría
    protected function parseAuditValues($values)
    {

        if (is_string($values)) {
            $values = json_decode($values, true);
        }

        if (is_array($values)) {
            return collect($values)->map(function ($value, $key) {
                if ($key == 'password') {
                    return '****';
                }

                if ($key == 'created_at') {
                    return \Carbon\Carbon::parse($value)->format('d-m-Y H:i:s');
                }
                return $value;
            });
        }
        return $values;
    }


    // Metodos para abrir y cerrar los modales
    public function closeDetails()
    {
        $this->showingDetails = false;
    }

    // Metodos para abrir y cerrar los modales
    public function openCreateForm()
    {
        $this->resetInputFields();
        $this->showingCreateForm = true;
    }

    public function closeCreateForm()
    {
        $this->showingCreateForm = false;
    }

    public function render()
    {
        return view('livewire.user-crud', [
            'users' => User::paginate(10),
        ])->layout('layouts.app');
    }
}

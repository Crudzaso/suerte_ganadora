<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class UserCrud extends Component
{
   use WithPagination;

    public $name, $email, $password, $user_id;
    public $isEditMode = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
    ];

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

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        session()->flash('message', 'Usuario creado exitosamente.');
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->user_id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->isEditMode = true;
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

        session()->flash('message', 'Usuario actualizado exitosamente.');
        $this->resetInputFields();
    }

    public function delete($id)
    {
        User::findOrFail($id)->delete();
        session()->flash('message', 'Usuario eliminado exitosamente.');
    }

    public function render()
    {
        return view('livewire.user-crud', [
            'users' => User::paginate(10),
        ]);
    }
}

<div>
    <h2>Gestión de Usuarios</h2>

    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="{{ $isEditMode ? 'update' : 'store' }}">
        <div class="form-group">
            <label>Nombre</label>
            <input type="text" class="form-control" wire:model="name">
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" wire:model="email">
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label>Contraseña</label>
            <input type="password" class="form-control" wire:model="password">
            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            {{ $isEditMode ? 'Actualizar Usuario' : 'Crear Usuario' }}
        </button>
        <button type="button" class="btn btn-secondary" wire:click="resetInputFields">Cancelar</button>
    </form>

    <hr>

    <h3>Lista de Usuarios</h3>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <button wire:click="edit({{ $user->id }})" class="btn btn-info btn-sm">Editar</button>
                        <button wire:click="delete({{ $user->id }})" class="btn btn-danger btn-sm">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $users->links() }} <!-- Paginación -->
</div>

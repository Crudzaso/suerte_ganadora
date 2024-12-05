@if(auth()->user()->can('users.index') && ('users.edit') && ('users.create') && ('users.delete'))

    <!--Page shown to users not allowed to edit content-->
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-column flex-column-fluid">
            <div class="container-xxl">
                <h2 class="text-3xl font-bold mb-6">Gestión de Usuarios</h2>

                @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
                @endif

                <button class="btn btn-success mb-6" wire:click="openCreateForm">
                    Crear Nuevo Usuario
                </button>

                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Rol</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->getRoleNames()->implode(', ') }}</td>
                                    <td>
                                        <button wire:click="showDetails({{ $user->id }})" class="btn btn-info">Detalles</button>
                                        <button wire:click="edit({{ $user->id }})" class="btn btn-warning">Editar</button>
                                        <button wire:click="delete({{ $user->id }})" class="btn btn-danger">Eliminar</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="mt-6">
                    {{ $users->links() }}
                </div>

                <!--modal for user creation or edition-->
                @if($showingCreateForm)
                <div class="modal fade show" tabindex="-1" style="display: block;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">{{ $isEditMode ? 'Editar Usuario' : 'Crear Usuario' }}</h5>
                                <button type="button" class="btn-close" wire:click="closeCreateForm"></button>
                            </div>
                            <div class="modal-body">
                                <form wire:submit.prevent="{{ $isEditMode ? 'update' : 'store' }}">
                                    <div class="mb-3">
                                        <label class="form-label">Nombre</label>
                                        <input type="text" class="form-control" wire:model="name">
                                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" wire:model="email">
                                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Contraseña</label>
                                        <input type="password" class="form-control" wire:model="password">
                                        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Rol</label>
                                        <select class="form-select" wire:model="selectedRole">
                                            <option value="">Selecciona un rol</option>
                                            @foreach($roles as $role)
                                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('selectedRole') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <button type="button" class="btn btn-danger" wire:click="closeCreateForm">Cancelar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

@else
    <!--Page shown to users not allowed to edit content-->
    <body class="d-flex justify-content-center align-items-center">

        <div class="message-container text-center">
            <h1>¡Ups, fuera de tu alcance!</h1>
            <p>Solo unos pocos elegidos tienen acceso a esta página.</p>
        </div>

        <!-- Vinculamos los archivos de JS de Bootstrap para el correcto funcionamiento de componentes si fuera necesario -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    </body>

@endif

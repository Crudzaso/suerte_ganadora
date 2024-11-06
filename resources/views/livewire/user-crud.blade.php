<div>
    <h2>Gestión de Usuarios</h2>

    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <!-- Botón para abrir el modal de creación de usuario -->
    <button class="btn btn-success mb-3" wire:click="openCreateForm">Crear Nuevo Usuario</button>

    <!-- Lista de Usuarios -->
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
                        <button wire:click="showDetails({{ $user->id }})" class="btn btn-primary btn-sm">Ver Detalles</button>
                        <button wire:click="edit({{ $user->id }})" class="btn btn-info btn-sm">Editar</button>
                        <button wire:click="delete({{ $user->id }})" class="btn btn-danger btn-sm">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $users->links() }} <!-- Paginación -->

    <!-- Modal para Crear Usuario -->
    @if($showingCreateForm)
        <div class="modal fade show" tabindex="-1" role="dialog" style="display: block;" aria-labelledby="createModalLabel" aria-hidden="false">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createModalLabel">Crear Nuevo Usuario</h5>
                        <button type="button" class="close" wire:click="closeCreateForm" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
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
                            <button type="button" class="btn btn-danger" wire:click="closeCreateForm">Cancelar</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" wire:click="closeCreateForm">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Modal de Detalles del Usuario -->
    @if($showingDetails)
        <div class="modal fade show" tabindex="-1" role="dialog" style="display: block;" aria-labelledby="detailsModalLabel" aria-hidden="false">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailsModalLabel">Detalles del Usuario</h5>
                        <button type="button" class="btn btn-danger" wire:click="closeDetails">Cerrar</button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Nombre:</strong> {{ $selectedUser->name }}</p>
                        <p><strong>Email:</strong> {{ $selectedUser->email }}</p>
                        <p><strong>Contraseña:</strong> *****</p>

                        <hr>

                        <h5>Auditoría del Usuario</h5>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Evento</th>
                                    <th>Fecha</th>
                                    <th>Antiguos Valores</th>
                                    <th>Nuevos Valores</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($audits as $audit)
                                    <tr>
                                        <td>{{ $audit->event }}</td>
                                        <td>{{ $audit->created_at }}</td>
                                        <td>
                                            @foreach($audit->old_values as $key => $value)
                                                <p><strong>{{ $key }}:</strong> {{ $value }}</p>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($audit->new_values as $key => $value)
                                                <p><strong>{{ $key }}:</strong> {{ $value }}</p>
                                            @endforeach
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

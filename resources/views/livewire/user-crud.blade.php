@if(auth()->user()->can('users.index') && ('users.edit') && ('users.create') && ('users.delete'))
    <div class="min-h-screen flex flex-col items-center bg-[#ECF0F1] p-6 w-full">
        <h2 class="text-3xl font-bold mb-6 text-gray-800">Gestión de Usuarios</h2>

        <!-- Mensaje de éxito -->
        @if (session()->has('message'))
        <div class="w-4/5 mb-4 p-4 bg-green-100 text-green-800 border border-green-200 rounded-lg">
            {{ session('message') }}
        </div>
        @endif

        <!-- Botón para crear un nuevo usuario -->
        <button class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 transition mb-6" wire:click="openCreateForm">
            Crear Nuevo Usuario
        </button>

        <!-- Tabla de Usuarios -->
        <div class="w-4/5 bg-white rounded-lg overflow-x-auto">
            <table class="w-full table-auto border-collapse">
                <thead class="bg-[#95A5A6] text-white">
                    <tr>
                        <th class="px-4 py-3 text-left">Nombre</th>
                        <th class="px-4 py-3 text-left">Email</th>
                        <th class="px-4 py-3 text-left">Rol</th>
                        <th class="px-4 py-3 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($users as $user)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 text-gray-900">{{ $user->name }}</td>
                        <td class="px-4 py-3 text-gray-700">{{ $user->email }}</td>
                        <td class="px-4 py-3 text-gray-500">{{ $user->getRoleNames()->implode(', ') }}</td>
                        <td class="px-4 py-3 flex justify-center space-x-2">
                            <button wire:click="showDetails({{ $user->id }})" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 transition">Detalles</button>
                            <button wire:click="edit({{ $user->id }})" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition">Editar</button>
                            <button wire:click="delete({{ $user->id }})" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition">Eliminar</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Paginación -->
        <div class="mt-6">
            {{ $users->links() }}
        </div>

        <!-- Modal para Crear o Editar Usuario -->
        @if($showingCreateForm)
        <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white rounded-lg p-6 w-4/5 max-w-md shadow-lg">
                <h5 class="text-xl font-semibold mb-4 text-gray-800">{{ $isEditMode ? 'Editar Usuario' : 'Crear Usuario' }}</h5>
                <form wire:submit.prevent="{{ $isEditMode ? 'update' : 'store' }}">
                    <div class="mb-4">
                        <label class="block text-gray-800 mb-1">Nombre</label>
                        <input type="text" class="w-full p-2 rounded border-gray-300 focus:border-blue-500 focus:ring-blue-500" wire:model="name">
                        @error('name') <span class="text-red-600">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-800 mb-1">Email</label>
                        <input type="email" class="w-full p-2 rounded border-gray-300 focus:border-blue-500 focus:ring-blue-500" wire:model="email">
                        @error('email') <span class="text-red-600">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-800 mb-1">Contraseña</label>
                        <input type="password" class="w-full p-2 rounded border-gray-300 focus:border-blue-500 focus:ring-blue-500" wire:model="password">
                        @error('password') <span class="text-red-600">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-800 mb-1">Rol</label>
                        <select class="w-full p-2 rounded border-gray-300 focus:border-blue-500 focus:ring-blue-500" wire:model="selectedRole">
                            <option value="">Selecciona un rol</option>
                            @foreach($roles as $role)
                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                        @error('selectedRole') <span class="text-red-600">{{ $message }}</span> @enderror
                    </div>
                    <div class="flex justify-end space-x-4">
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Guardar</button>
                        <button type="button" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition" wire:click="closeCreateForm">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
        @endif
    </div>
@else
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
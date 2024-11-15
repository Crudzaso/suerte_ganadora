<!-- resources/views/livewire/create-rifa.blade.php -->

<div class="flex flex-col justify-center items-center min-h-screen bg-gray-50">
    <!-- Título de la vista -->
    <h2 class="text-4xl font-bold mb-10 text-gray-800">Crear Rifa</h2>

    <!-- Formulario de creación -->
    <form wire:submit.prevent="create" class="w-full max-w-lg space-y-6 px-6">
        <!-- Campo Título -->
        <div class="flex flex-col">
            <label for="title" class="text-lg font-semibold text-gray-700 mb-1">Título</label>
            <input type="text" id="title" wire:model="title"
                class="w-full h-16 px-4 text-lg rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500"
                placeholder="Ingresa el título">
            @error('title') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- Campo Descripción -->
        <div class="flex flex-col">
            <label for="description" class="text-lg font-semibold text-gray-700 mb-1">Descripción</label>
            <textarea id="description" wire:model="description"
                class="w-full h-36 px-4 text-lg rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500"
                placeholder="Ingresa la descripción"></textarea>
            @error('description') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- Campo Fecha de Inicio -->
        <div class="flex flex-col">
            <label for="start_date" class="text-lg font-semibold text-gray-700 mb-1">Fecha de Inicio</label>
            <input type="date" id="start_date" wire:model="start_date"
                class="w-full h-16 px-4 text-lg rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500">
            @error('start_date') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- Campo Fecha de Fin -->
        <div class="flex flex-col">
            <label for="end_date" class="text-lg font-semibold text-gray-700 mb-1">Fecha de Fin</label>
            <input type="date" id="end_date" wire:model="end_date"
                class="w-full h-16 px-4 text-lg rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500">
            @error('end_date') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- Campo Estado -->
        <div class="flex flex-col">
            <label for="status" class="text-lg font-semibold text-gray-700 mb-1">Estado</label>
            <select id="status" wire:model="status"
                class="w-full h-16 px-4 text-lg rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500">
                <option value="active">Activa</option>
                <option value="inactive">Inactiva</option>
            </select>
            @error('status') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- Botón de Creación -->
        <div class="flex justify-center">
            <button type="submit"
                class="w-full h-16 bg-green-600 text-white text-lg font-semibold rounded-md shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                Crear Rifa
            </button>
        </div>
    </form>
</div>
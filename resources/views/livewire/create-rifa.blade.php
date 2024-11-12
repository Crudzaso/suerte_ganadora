<!-- resources/views/livewire/create-rifa.blade.php -->
@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-2xl font-semibold mb-4">Crear Nueva Rifa</h2>

    <form wire:submit.prevent="saveRifa" class="space-y-6">
        <!-- Campo Título -->
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Título</label>
            <input type="text" id="title" wire:model="title" 
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                   placeholder="Ejemplo: Gran Rifa de Navidad">
            @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Campo Descripción -->
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Descripción</label>
            <textarea id="description" wire:model="description" rows="3" 
                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                      placeholder="Detalles sobre la rifa..."></textarea>
            @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Campo Fecha de Inicio -->
        <div>
            <label for="start_date" class="block text-sm font-medium text-gray-700">Fecha de Inicio</label>
            <input type="date" id="start_date" wire:model="start_date" 
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            @error('start_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Campo Fecha de Finalización -->
        <div>
            <label for="end_date" class="block text-sm font-medium text-gray-700">Fecha de Finalización</label>
            <input type="date" id="end_date" wire:model="end_date" 
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            @error('end_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Campo Estado -->
        <div>
            <label for="status" class="block text-sm font-medium text-gray-700">Estado</label>
            <select id="status" wire:model="status" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value="">Seleccione un estado</option>
                <option value="activo">Activo</option>
                <option value="inactivo">Inactivo</option>
            </select>
            @error('status') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Botón para Guardar la Rifa -->
        <div class="text-right">
            <button type="submit" 
                    class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-200 active:bg-indigo-600 disabled:opacity-25 transition">
                Guardar Rifa
            </button>
        </div>
    </form>
</div>
@endsection

<!-- resources/views/livewire/show-rifa.blade.php -->
@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-2xl font-semibold mb-4">{{ $title }}</h2>

    <div class="space-y-4">
        <!-- Descripción -->
        <div>
            <h3 class="text-lg font-medium text-gray-700">Descripción:</h3>
            <p class="text-gray-600">{{ $description }}</p>
        </div>

        <!-- Fecha de Inicio -->
        <div>
            <h3 class="text-lg font-medium text-gray-700">Fecha de Inicio:</h3>
            <p class="text-gray-600">{{ $start_date->format('d/m/Y') }}</p>
        </div>

        <!-- Fecha de Finalización -->
        <div>
            <h3 class="text-lg font-medium text-gray-700">Fecha de Finalización:</h3>
            <p class="text-gray-600">{{ $end_date->format('d/m/Y') }}</p>
        </div>

        <!-- Estado -->
        <div>
            <h3 class="text-lg font-medium text-gray-700">Estado:</h3>
            <span class="px-2 py-1 rounded-full text-white {{ $status === 'activo' ? 'bg-green-500' : 'bg-red-500' }}">
                {{ ucfirst($status) }}
            </span>
        </div>
    </div>

    <!-- Botón para volver a la lista de rifas -->
    <div class="mt-6 text-right">
        <a href="{{ route('rifa.index') }}" 
           class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-200 active:bg-indigo-600 disabled:opacity-25 transition">
            Volver a la lista
        </a>
    </div>
</div>
@endsection

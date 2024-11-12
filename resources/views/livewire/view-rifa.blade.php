<!-- resources/views/livewire/rifas/index.blade.php -->
@extends('layouts.app')

@section('content')
<div>
    <button wire:click="create" class="btn btn-primary">Crear Rifa</button>

    @foreach($rifas as $rifa)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $rifa->title }}</h5>
                <p class="card-text">{{ $rifa->description }}</p>
                <p class="card-text">Fecha de inicio: {{ $rifa->start_date }}</p>
                <p class="card-text">Fecha de fin: {{ $rifa->end_date }}</p>
                <button wire:click="edit({{ $rifa->id }})" class="btn btn-secondary">Editar</button>
                <button wire:click="deleteRifa({{ $rifa->id }})" class="btn btn-danger">Eliminar</button>
            </div>
        </div>
    @endforeach
</div>

@endsection

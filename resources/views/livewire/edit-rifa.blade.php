<!-- resources/views/livewire/edit-rifa.blade.php -->
@extends('layouts.app')

@section('content')
<div>
    <form wire:submit.prevent="update">
        <input type="text" wire:model="title" placeholder="Título">
        <textarea wire:model="description" placeholder="Descripción"></textarea>
        <input type="date" wire:model="start_date">
        <input type="date" wire:model="end_date">
        <select wire:model="status">
            <option value="active">Activa</option>
            <option value="inactive">Inactiva</option>
        </select>
        <button type="submit">Actualizar Rifa</button>
    </form>
</div>

@endsection

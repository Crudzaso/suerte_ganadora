@extends('layouts.app')

@section('content')
<section class="container-table-example">
    <div class="container mt-4">
        <!-- Verificar si el usuario tiene el rol 'Administrador' -->
       {{-- Mostrar roles asignados para depuración --}}
       @foreach(auth()->user()->roles as $role)
       <div class="alert alert-success text-center">
           <h4>Bienvenido, {{ $role->name }}!</h4>
       </div>
   @endforeach
   


        <h2 class="text-center">Ejemplo de Tabla</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Fecha de Registro</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Juan Pérez</td>
                    <td>juan.perez@example.com</td>
                    <td>2023-01-15</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>María López</td>
                    <td>maria.lopez@example.com</td>
                    <td>2023-02-20</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Carlos Ruiz</td>
                    <td>carlos.ruiz@example.com</td>
                    <td>2023-03-10</td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- Otras tablas o contenido -->
</section>
@endsection

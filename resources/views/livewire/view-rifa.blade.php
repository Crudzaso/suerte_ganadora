@section('page-title')
    Rifas
@endsection
<div class="container mx-auto px-4 py-6">
    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

@if (session()->has('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<div class="container mx-auto px-4 py-6">
    @role('admin')
    <!-- Botón para crear una nueva rifa -->
    <div class="d-flex flex-wrap flex-stack mb-6">
        <div class="d-flex flex-wrap my-2">
            <a href="{{ route('rifas.create') }}" class="btn btn-primary btn-sm">Crear nueva rifa</a>
        </div>
        <!--end::Actions-->
    </div>
    @endrole


    <!-- Listado de rifas en tarjetas -->
    <div class="row">
        @foreach($rifas as $rifa)
        <div wire:key="rifa-{{ $rifa->id }}" class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">{{ $rifa->title }}</h5>
                    <p class="card-text">{{ $rifa->description }}</p>
                    <p class="text-muted">Fecha de inicio: <strong>{{ $rifa->start_date }}</strong></p>
                    <p class="text-muted">Fecha de fin: <strong>{{ $rifa->end_date }}</strong></p>

                    <!-- Botones de acción -->
                    @role('admin')
                    <div class="d-flex justify-content-between mt-4">
                        <button wire:click="edit({{ $rifa->id }})" class="btn btn-warning">
                            Editar
                        </button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $rifa->id }}">
                            Eliminar
                        </button>
                    </div>
                    @endrole
                </div>
            </div>
        </div>

        <!-- Modal to delete raffle -->
        @role('admin')
        <div class="modal fade" tabindex="-1" id="deleteModal-{{ $rifa->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">¿Estás seguro de eliminar esta rifa?</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <p>Esta acción no se puede deshacer.</p>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-danger" wire:click="deleteRifa({{ $rifa->id }})" data-bs-dismiss="modal">Confirmar</button>
                    </div>
                </div>
            </div>
        </div>
        @endrole
        @endforeach
    </div>
</div>
<!-- Paginación -->
<div class="mt-4">
    {{ $rifas->links() }}
</div>

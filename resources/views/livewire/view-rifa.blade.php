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
    <div class="row g-6 g-xl-9">
        @foreach($rifas as $rifa)
        <div wire:key="rifa-{{ $rifa->id }}" class="col-md-6 col-xl-4">
                <!--Remember to place the HREF TO A DETAILED VIEW OF THE RAFFLE FOR THE CS TO BUY A TICKET-->
                <a href="#" class="card border-hover-primary">
                    <!--Remember to place the HREF TO A DETAILED VIEW OF THE RAFFLE FOR THE CS TO BUY A TICKET-->
                    <div class="card-header border-0 pt-9">
                        <div class="card-title m-0">
                            <div class="symbol symbol-50px w-50px bg-light">
                            <img src="{{ asset('assets/media/suerte_ganadora_logo-removebg-preview.png') }}" alt="Lotería">
                            </div>
                        </div>
                        <div class="card-toolbar">
                            <span class="badge badge-light-primary fw-bold me-auto px-4 py-3">Nombre de la lotería</span>
                        </div>
                    </div>
                    <div class="card-body p-9">
                        <div class="fs-3 fw-bold text-gray-900">{{ $rifa->title }}</div>
                        <p class="text-gray-500 fw-semibold fs-5 mt-1 mb-7">{{ $rifa->description }}</p>
                        <div class="d-flex flex-wrap mb-5">
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                                <div class="fs-6 text-gray-800 fw-bold">{{ $rifa->start_date }}</div>
                                <div class="fw-semibold text-gray-500">Fecha de inicio:</div>
                            </div>
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                                <div class="fs-6 text-gray-800 fw-bold">{{ $rifa->end_date }}</div>
                                <div class="fw-semibold text-gray-500">Fecha de fin:</div>
                            </div>
                        </div>
                        @role('admin')
                        <!-- Botones de acción -->
                            <div class="flex justify-between mt-4">
                                <button wire:click="edit({{ $rifa->id }})"
                                    class="btn btn-primary">
                                    Editar
                                </button>
                                <button type="button" class="btn btn-danger" @click="$dispatch('confirm-delete', {{ $rifa->id }})" data-bs-toggle="modal" data-bs-target="#kt_modal_1">
                                    Eliminar
                                </button>
                            </div>
                        @endrole
                    </div>
                </a>
        </div>
        @endforeach
    </div>

    <!-- Paginación -->
    <div class="mt-8">
        {{ $rifas->links() }}
    </div>

@role('admin')
<!-- Modal to delete raffle -->
<div class="modal fade" tabindex="-1" id="kt_modal_1" x-data="{ open: false, rifaId: null }" @confirm-delete.window="console.log('Evento confirm-delete recibido con ID:', $event.detail); open = true; rifaId = $event.detail">>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Confirmar eliminación</h3>
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
            </div>

            <div class="modal-body">
                <p>¿Estás seguro de que deseas eliminar esta rifa? Esta acción no se puede deshacer.</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-danger"
                x-on:click="if (rifaId) { $wire.deleteRifa(rifaId); open = false; }"
                data-bs-dismiss="modal">Confirmar</button>
            </div>
        </div>
    </div>
</div>
@endrole

</div>

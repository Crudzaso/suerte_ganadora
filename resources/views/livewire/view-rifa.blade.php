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
                                <button x-data @click="$dispatch('confirm-delete', {{ $rifa->id }})"
                                    class="btn btn-danger">
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
    <!-- Modal de Confirmación -->
    <div x-data="{ open: false, rifaId: null }" @confirm-delete.window="open = true; rifaId = $event.detail">
        <div x-show="open" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white rounded-lg p-6 w-full max-w-md shadow-lg">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">¿Estás seguro de eliminar esta rifa?</h3>
                <p class="text-gray-600 mb-6">Esta acción no se puede deshacer.</p>

                <div class="flex justify-end space-x-4">
                    <button @click="open = false"
                        class="px-4 py-2 bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-400 transition">
                        Cancelar
                    </button>
                    <button @click="$wire.deleteRifa(rifaId); open = false"
                        class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                        Confirmar
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endrole

</div>
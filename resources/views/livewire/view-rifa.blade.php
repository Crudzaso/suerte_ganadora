<div class="container mx-auto px-4 py-6">
    
    @role('admin')
        <!-- Botón para crear una nueva rifa -->
        <div class="flex justify-end mb-6">
            <a href="{{ route('rifas.create') }}" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
                Crear nueva rifa
            </a>
        </div>
    @endrole
    <!-- Listado de rifas en tarjetas -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($rifas as $rifa)
        <div wire:key="rifa-{{ $rifa->id }}"
            class="bg-white rounded-lg shadow-lg p-6 hover:shadow-2xl hover:-translate-y-2 transition transform duration-300 ease-in-out">
            <h5 class="text-2xl font-bold mb-2 text-gray-800">{{ $rifa->title }}</h5>
            <p class="text-gray-600 mb-4">{{ $rifa->description }}</p>
            <p class="text-sm text-gray-500">Fecha de inicio: <span class="font-medium">{{ $rifa->start_date }}</span></p>
            <p class="text-sm text-gray-500">Fecha de fin: <span class="font-medium">{{ $rifa->end_date }}</span></p>
            @role('admin')
            <!-- Botones de acción -->
                <div class="flex justify-between mt-4">
                    <button wire:click="edit({{ $rifa->id }})"
                        class="px-4 py-2 bg-yellow-500 text-white rounded-lg shadow hover:bg-yellow-600 transition duration-300">
                        Editar
                    </button>
                    <button x-data @click="$dispatch('confirm-delete', {{ $rifa->id }})"
                        class="px-4 py-2 bg-red-600 text-white rounded-lg shadow hover:bg-red-700 transition duration-300">
                        Eliminar
                    </button>
                </div>
            @endrole
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
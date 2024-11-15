<div class="min-h-screen bg-gray-100 p-6">
    <!-- Header -->
    <header class="flex justify-between items-center bg-blue-600 text-white p-4 rounded-lg shadow-md mb-8">
        <h1 class="text-3xl font-bold">Bienvenido a RifaFácil</h1>
        <div>
            <a href="#" class="px-4 py-2 bg-green-500 rounded-lg hover:bg-green-600 transition">Mi Cuenta</a>
            <a href="#" class="ml-4 px-4 py-2 bg-red-500 rounded-lg hover:bg-red-600 transition">Cerrar Sesión</a>
        </div>
    </header>

    <!-- Banner de Bienvenida -->
    <div class="bg-gradient-to-r from-blue-500 to-blue-400 text-white rounded-lg p-6 mb-8 shadow-lg">
        <h2 class="text-2xl font-bold mb-2">Participa y Gana Increíbles Premios</h2>
        <p class="text-lg">Compra un boleto para tener la oportunidad de ganar, o revisa nuestras reseñas para ver la experiencia de otros participantes.</p>
    </div>

    <!-- Sección de Rifas Activas -->
    <section class="mb-8">
        <h3 class="text-xl font-bold text-gray-800 mb-4">Rifas Activas</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($rifas as $rifa)
            <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition">
                <h4 class="text-2xl font-bold text-gray-800 mb-2">{{ $rifa->nombre }}</h4>
                <p class="text-gray-700 mb-4">{{ $rifa->descripcion }}</p>
                <p class="text-blue-600 font-semibold mb-2">Premio: {{ $rifa->premio }}</p>
                <p class="text-gray-600 mb-4">Precio del Boleto: ${{ $rifa->precio }}</p>
                <button class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-blue-700 transition" wire:click="comprarBoleto({{ $rifa->id }})">Comprar Boleto</button>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Sección de Reseñas y Calificaciones -->
    <section class="mb-8">
        <h3 class="text-xl font-bold text-gray-800 mb-4">Reseñas de Usuarios</h3>
        <div class="bg-white rounded-lg shadow-lg p-6">
            @forelse($reseñas as $reseña)
            <div class="border-b border-gray-200 pb-4 mb-4">
                <p class="font-semibold text-gray-800">{{ $reseña->usuario }}</p>
                <p class="text-gray-700">{{ $reseña->comentario }}</p>
                <div class="text-yellow-400">
                    @for($i = 1; $i <= 5; $i++)
                        <span class="fa fa-star {{ $i <= $reseña->calificacion ? 'text-yellow-500' : 'text-gray-300' }}"></span>
                        @endfor
                </div>
            </div>
            @empty
            <p class="text-gray-600">Aún no hay reseñas. Sé el primero en dejar una calificación.</p>
            @endforelse
        </div>
    </section>

    <!-- Sección de Mis Boletos -->
    <section>
        <h3 class="text-xl font-bold text-gray-800 mb-4">Mis Boletos</h3>
        <div class="bg-white rounded-lg shadow-lg p-6">
            @if(count($boletos))
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="text-left px-4 py-2">Rifa</th>
                        <th class="text-left px-4 py-2">Número de Boleto</th>
                        <th class="text-left px-4 py-2">Fecha de Compra</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($boletos as $boleto)
                    <tr class="hover:bg-gray-100">
                        <td class="px-4 py-2">{{ $boleto->rifa->nombre }}</td>
                        <td class="px-4 py-2">{{ $boleto->numero }}</td>
                        <td class="px-4 py-2">{{ $boleto->fecha_compra }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p class="text-gray-600">No has comprado ningún boleto aún. ¡Empieza a participar en nuestras rifas!</p>
            @endif
        </div>
    </section>
</div>
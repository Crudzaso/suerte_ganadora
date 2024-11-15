<div class="min-h-screen bg-gray-100 p-6">
    <!-- Header -->
    <header class="flex justify-between items-center bg-indigo-600 text-white p-6 rounded-lg shadow-md mb-10">
        <h1 class="text-4xl font-extrabold">Bienvenido a <span class="text-yellow-400">RifaFácil</span></h1>
    </header>

    <!-- Welcome Banner -->
    <div class="bg-gradient-to-r from-teal-500 to-teal-400 text-white rounded-lg p-8 mb-10 shadow-md">
        <h2 class="text-3xl font-bold mb-3">¡Participa y Gana Increíbles Premios!</h2>
        <p class="text-xl font-medium leading-relaxed mb-4">Compra un boleto y tendrás la oportunidad de ganar fantásticos premios. Cada sorteo es una nueva oportunidad, y lo mejor de todo: ¡los premios son reales!</p>
        <p class="text-lg">Además, revisa las reseñas para conocer la experiencia de otros participantes que ya han ganado y cómo ha cambiado su vida. No te pierdas esta oportunidad de ser parte de la emoción.</p>
    </div>

    <!-- Active Raffles Section -->
    <section class="mb-10">
        <h3 class="text-2xl font-bold text-gray-800 mb-6">Rifas Activas</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($rifas as $rifa)
            <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col transition hover:shadow-md">
                <h4 class="text-2xl font-bold text-gray-800 mb-4">{{ $rifa->title }}</h4>
                <p class="text-lg text-gray-600 mb-6">{{ $rifa->description }}</p>
                <p class="text-teal-600 font-semibold text-lg mb-4">Finaliza el: <span class="text-teal-900">{{ $rifa->end_date }}</span></p>
                <div class="mt-auto">
                    <button class="w-full bg-indigo-600 text-white px-6 py-3 rounded-lg text-lg font-semibold hover:bg-indigo-700 transition duration-300" wire:click="comprarBoleto({{ $rifa->id }})">Comprar Boleto</button>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- User Reviews Section -->
    <section class="mb-10">
        <h3 class="text-2xl font-bold text-gray-800 mb-6">Reseñas de Usuarios</h3>
        <div class="bg-white rounded-lg shadow-lg p-6">
            @forelse($reseñas as $reseña)
            <div class="border-b border-gray-200 pb-6 mb-6">
                <p class="font-semibold text-xl text-gray-800">{{ $reseña->user->name }}</p>
                <p class="text-lg text-gray-700 mb-3">{{ $reseña->comment }}</p>
                <div class="text-yellow-400 mb-4">
                    @for($i = 1; $i <= 5; $i++)
                        <span class="fa fa-star {{ $i <= $reseña->rating ? 'text-yellow-500' : 'text-gray-300' }}"></span>
                        @endfor
                </div>
            </div>
            @empty
            <p class="text-gray-600">Aún no hay reseñas. Sé el primero en dejar una calificación.</p>
            @endforelse
        </div>
    </section>

    <!-- My Tickets Section -->
    <section>
        <h3 class="text-2xl font-bold text-gray-800 mb-6">Mis Boletos</h3>
        <div class="bg-white rounded-lg shadow-lg p-6">
            @if(count($boletos))
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="text-left px-6 py-4 text-lg font-medium text-gray-800">Rifa</th>
                        <th class="text-left px-6 py-4 text-lg font-medium text-gray-800">Número de Boleto</th>
                        <th class="text-left px-6 py-4 text-lg font-medium text-gray-800">Fecha de Compra</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($boletos as $boleto)
                    <tr class="hover:bg-gray-100">
                        <td class="px-6 py-4 text-lg text-gray-800">{{ $boleto->raffle->title }}</td>
                        <td class="px-6 py-4 text-lg text-gray-800">{{ $boleto->ticket_number }}</td>
                        <td class="px-6 py-4 text-lg text-gray-800">{{ $boleto->buy_date }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p class="text-gray-600">No has comprado ningún boleto aún. ¡Empieza a participar en nuestras rifas y no te pierdas la oportunidad de ganar!</p>
            @endif
        </div>
    </section>
</div>
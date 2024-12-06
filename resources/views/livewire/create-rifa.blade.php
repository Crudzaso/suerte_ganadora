@role('admin')
    @section('page-title')
        Crear Rifa
    @endsection
    <div class="app-container container-xxl">
        <div class="card mb-5 mb-xl-10">
            <div class="collapse show">
                <!-- Raffle Creation form -->
                <form wire:submit.prevent="create" class="form fv-plugins-bootstrap5 fv-plugins-framework">
                    <div class="card-body border-top p-9">
                        <!-- Title field -->
                        <div class="row mb-6">
                            <label for="title" class="col-lg-4 col-form-label required fw-semibold fs-6">Título</label>
                            <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                <input type="text" id="title" wire:model="title"
                                    class= "form-control form-control-lg form-control-solid"
                                    placeholder="Ingresa el título">
                                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                    @error('title') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        <!-- description field -->
                        <div class="row mb-6">
                            <label for="description" class="col-lg-4 col-form-label required fw-semibold fs-6">Descripción</label>
                            <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                <textarea id="description" wire:model="description"
                                    class="form-control form-control-lg form-control-solid"
                                    placeholder="Ingresa la descripción">
                                </textarea>
                            </div>
                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                @error('description') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Campo Fecha de Inicio -->
                        <div class="row mb-6">
                            <label for="start_date" class="col-lg-4 col-form-label required fw-semibold fs-6">Fecha de Inicio</label>
                            <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                <input type="date" id="start_date" wire:model="start_date"
                                    class="form-control form-control-lg form-control-solid">
                            </div>
                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                @error('start_date') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Campo Fecha de Fin -->
                        <div class="row mb-6">
                            <label for="end_date" class="col-lg-4 col-form-label required fw-semibold fs-6">Fecha de Fin</label>
                            <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                <input type="date" id="end_date" wire:model="end_date"
                                    class="form-control form-control-lg form-control-solid">
                            </div>
                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                @error('end_date') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Campo Estado -->
                        <div class="row mb-6">
                            <label for="status" class="col-lg-4 col-form-label required fw-semibold fs-6">Estado</label>
                            <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                <select id="status" wire:model="status"
                                    class="form-control form-control-lg form-control-solid" data-placeholder="Selecciona una opción" >
                                    <option value="null" selected>Selecciona una opción</option>
                                    <option value="active" name="active">Activa</option>
                                    <option value="inactive" name="inactive">Inactiva</option>
                                </select>
                            </div>
                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                @error('status') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Campo de Lotería -->
                        <div class="row mb-6">
                            <label for="status" class="col-lg-4 col-form-label required fw-semibold fs-6">Lotería</label>
                            
                            <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                @if ($getLotteries->isEmpty())
                                    <div class="alert alert-warning">
                                        No hay loterías disponibles en este momento.
                                    </div>
                                    <select class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" disabled>
                                        <option>No disponible</option>
                                    </select>
                                @else
                                    <select id="lottery" wire:model="lottery"
                                        class="form-control form-control-lg form-control-solid" data-placeholder="Selecciona una opción" >
                                        <option value="null" selected>Selecciona una Lotería</option>
                                        @foreach ($getLotteries as $lottery )
                                            <option value="{{ $lottery }}" name="{{ $lottery }}">Activa</option>    
                                        @endforeach                                   
                                    </select>
                                @endif
                            </div>
                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                @error('status') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Botón de Creación -->
                        <div class="flex justify-center">
                            <button class="btn btn-primary" type="submit"
                                class="w-full h-16 bg-green-600 text-white text-lg font-semibold rounded-md shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                                Crear Rifa
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@else
    @section('page-title')
        Página no disponible
    @endsection
    <!--Page shown to users not allowed to edit raffles-->
    <body class="d-flex justify-content-center align-items-center">

        <div class="message-container text-center">
            <h1>¡Ups, fuera de tu alcance!</h1>
            <p>Solo unos pocos elegidos tienen acceso a esta página.</p>
        </div>
    </body>

@endrole

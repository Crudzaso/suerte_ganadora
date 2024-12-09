
@role('admin')
    @section('page-title')
        Editar Rifa
    @endsection
    <!-- resources/views/livewire/edit-rifa.blade.php -->

    <div class="app-container container-xxl">
        <div class="card mb-5 mb-xl-10">
            <div class="collapse show">

                <!-- Formulario de edición -->
                <form wire:submit.prevent="update" class="form fv-plugins-bootstrap5 fv-plugins-framework">
                    <div class="card-body border-top p-9">
                        <!-- Campo Título -->
                        <div class="row mb-6">
                                <label for="title" class="col-lg-4 col-form-label required fw-semibold fs-6">Título</label>
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                <input type="text" id="title" wire:model="title"
                                    class="form-control form-control-lg form-control-solid"
                                    placeholder="Ingresa el título">
                                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                    @error('title') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Campo Descripción -->
                        <div class="row mb-6">
                                <label for="description" class="col-lg-4 col-form-label required fw-semibold fs-6">Descripción</label>
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                <textarea id="description" wire:model="description"
                                        class="form-control form-control-lg form-control-solid"
                                        placeholder="Ingresa la descripción"></textarea>
                                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                    @error('description') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Campo Fecha de Inicio -->
                        <div class="row mb-6">
                                <label for="start_date" class="col-lg-4 col-form-label required fw-semibold fs-6">Fecha de Inicio</label>
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                <input type="date" id="start_date" wire:model="start_date"
                                    class="form-control form-control-lg form-control-solid">
                                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                    @error('start_date') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Campo Fecha de Fin -->
                        <div class="row mb-6">
                                <label for="end_date" class="col-lg-4 col-form-label required fw-semibold fs-6">Fecha de Fin</label>
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                <input type="date" id="end_date" wire:model="end_date"
                                    class="form-control form-control-lg form-control-solid">
                                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                    @error('end_date') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Campo Estado -->
                        <div class="row mb-6">
                                <label for="status" class="col-lg-4 col-form-label required fw-semibold fs-6">Estado</label>
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                <select id="status" wire:model="status"
                                        class="form-control form-control-lg form-control-solid">
                                    <option value="null" selected>Selecciona una opción</option>
                                    <option value="active" name="active">Activa</option>
                                    <option value="inactive" name="inactive">Inactiva</option>
                                </select>
                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                @error('status') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Botón de Actualización -->
                        <div class="flex justify-center">
                            <button type="submit"
                                    class="btn btn-primary">
                                Actualizar Rifa
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

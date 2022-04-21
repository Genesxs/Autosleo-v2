
    <x-jet-form-section submit="updateProfileInformation">
        <x-slot name="title">
            {{ __('Información del perfil') }}
        </x-slot>
    
        <x-slot name="description">
            {{ __('Actualiza tu cuenta de perfil y contraseña') }}
        </x-slot>
    
            <x-slot name="form">
    
                <x-jet-action-message on="saved">
                    {{ __('Se ha guardo exitosamente.') }}
                </x-jet-action-message>
        
                <!-- Profile Photo -->
                {{-- @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="mb-3" x-data="{photoName: null, photoPreview: null}">
                        <!-- Profile Photo File Input -->
                        <input type="file" hidden
                               wire:model="photo"
                               x-ref="photo"
                               x-on:change="
                                            photoName = $refs.photo.files[0].name;
                                            const reader = new FileReader();
                                            reader.onload = (e) => {
                                                photoPreview = e.target.result;
                                            };
                                            reader.readAsDataURL($refs.photo.files[0]);
                                    " />
        
                        <x-jet-label for="photo" value="{{ __('Photo') }}" />
        
                        <!-- Current Profile Photo -->
                        <div class="mt-2" x-show="! photoPreview">
                            <img src="{{ $this->user->profile_photo_url }}" class="rounded-circle" height="80px" width="80px">
                        </div>
        
                        <!-- New Profile Photo Preview -->
                        <div class="mt-2" x-show="photoPreview">
                            <img x-bind:src="photoPreview" class="rounded-circle" width="80px" height="80px">
                        </div>
        
                        <x-jet-secondary-button class="mt-2 me-2" type="button" x-on:click.prevent="$refs.photo.click()">
                            {{ __('Select A New Photo') }}
                        </x-jet-secondary-button>
                        
                        @if ($this->user->profile_photo_path)
                            <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                                <div wire:loading wire:target="deleteProfilePhoto" class="spinner-border spinner-border-sm" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
        
                                {{ __('Remove Photo') }}
                            </x-jet-secondary-button>
                        @endif
        
                        <x-jet-input-error for="photo" class="mt-2" />
                    </div>
                @endif --}}
    
                
        
                <div class="w-md-75 container-fluid">
        
                    <!-- Nickname -->
                    <div class="mb-3">
                        <x-jet-label for="name" value="{{ __('Nickname') }}" />
                        <x-jet-input id="name" type="text" class="{{ $errors->has('name') ? 'is-invalid' : '' }}" wire:model.defer="state.name" autocomplete="name" />
                        <x-jet-input-error for="name" />
                    </div>
        
                    <!-- Nombres -->
                    <div class="mb-3">
                        <x-jet-label for="nombres" value="{{ __('Nombres') }}" />
                        <x-jet-input id="nombres" type="text" class="{{ $errors->has('nombres') ? 'is-invalid' : '' }}" wire:model.defer="state.nombres" autocomplete="nombres" />
                        <x-jet-input-error for="name"/>
                    </div>
        
                    <!-- Apellidos -->
                    <div class="mb-3">
                        <x-jet-label for="apellidos" value="{{ __('Apellidos') }}" />
                        <x-jet-input id="apellidos" type="text" class="{{ $errors->has('apellidos') ? 'is-invalid' : '' }}" wire:model.defer="state.apellidos" />
                        <x-jet-input-error for="email" />
                    </div>
            
                    <!-- Email -->
                    <div class="mb-3">
                        <x-jet-label for="email" value="{{ __('Correo electrónico') }}" />
                        <x-jet-input id="email" type="email" class="{{ $errors->has('email') ? 'is-invalid' : '' }}" wire:model.defer="state.email" />
                        <x-jet-input-error for="email" />
                    </div>
                    <!-- Direccion -->
                    <div class="mb-3">
                        <x-jet-label for="direccion" value="{{ __('Dirección') }}" />
                        <x-jet-input id="direccion" type="text" class="{{ $errors->has('direccion') ? 'is-invalid' : '' }}" wire:model.defer="state.direccion" />
                        <x-jet-input-error for="email" />
                    </div>
                    <!-- Celular -->
                    <div class="mb-3">
                        <x-jet-label for="celular" value="{{ __('Celular') }}" />
                        <x-jet-input id="celular" type="text" class="{{ $errors->has('celular') ? 'is-invalid' : '' }}" wire:model.defer="state.celular" />
                        <x-jet-input-error for="celularl" />
                    </div>
                    <!-- Telefono -->
                    <div class="mb-3">
                        <x-jet-label for="telefono" value="{{ __('Teléfono') }}" />
                        <x-jet-input id="telefono" type="text" class="{{ $errors->has('telefono') ? 'is-invalid' : '' }}" wire:model.defer="state.telefono" />
                        <x-jet-input-error for="telefono" />
                    </div>
                </div>
            </x-slot>
        
            <x-slot name="actions">
                <div class="d-flex align-items-baseline">
                    <x-jet-button>
                        <div wire:loading class="spinner-border spinner-border-sm" role="status">
                            <span class="visually-hidden">Cargando...</span>
                        </div>
        
                        {{ __('Guardar') }}
                    </x-jet-button>
                </div>
            </x-slot>
        
    </x-jet-form-section>


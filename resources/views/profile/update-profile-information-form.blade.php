<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Información del perfil') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Actualice la información de perfil y la dirección de correo electrónico de su cuenta. ') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
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
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Seleccionar foto') }}
                </x-jet-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remover foto') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class=" col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Nombre(s)') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>
        {{-- Apellidos --}}
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="apellidos" value="{{ __('Apellidos') }}" />
            <x-jet-input id="apellidos" type="text" class="mt-1 block w-full" wire:model.defer="state.apellidos" autocomplete="apellidos" />
            <x-jet-input-error for="apellidos" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>

        {{-- rfc --}}
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="rfc" value="{{ __('RFC de la empresa') }}" />
            <x-jet-input id="rfc_input" type="text" class="mt-1 block w-full" oninput="validarInput2(this)" wire:model.defer="state.rfc" autocomplete="rfc" />
            <x-jet-input-error for="rfc" class="mt-2" />
            <pre id="rfc"></pre>
        </div>

        {{-- curp --}}
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="curp" value="{{ __('CURP personal') }}" />
            <x-jet-input id="curp_input" type="text" oninput="validarInput(this)" class="mt-1 block w-full" wire:model.defer="state.curp" autocomplete="curp" />
            <x-jet-input-error for="curp" class="mt-2" />
            <pre id="curp"></pre>
        </div>

        {{-- curp --}}
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="empresa" value="{{ __('Empresa') }}" />
            <x-jet-input id="empresa" type="text" class="mt-1 block w-full" wire:model.defer="state.empresa" autocomplete="empresa" />
            <x-jet-input-error for="empresa" class="mt-2" />
        </div>

        {{-- curp --}}
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="ocupacion" value="{{ __('Ocupación') }}" />
            <x-jet-input id="ocupacion" type="text" class="mt-1 block w-full" wire:model.defer="state.ocupacion" autocomplete="ocupacion" />
            <x-jet-input-error for="ocupacion" class="mt-2" />
        </div>

        {{-- curp --}}
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="puesto" value="{{ __('Puesto') }}" />
            <x-jet-input id="puesto" type="text" class="mt-1 block w-full" wire:model.defer="state.puesto" autocomplete="puesto" />
            <x-jet-input-error for="puesto" class="mt-2" />
        </div>

        {{-- telefono --}}
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="telefono" value="{{ __('Telefono') }}" />
            <x-jet-input id="telefono" type="text" class="mt-1 block w-full" wire:model.defer="state.telefono" autocomplete="telefono" />
            <x-jet-input-error for="telefono" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Guardado') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Guardar') }}
        </x-jet-button>
    </x-slot>


</x-jet-form-section>

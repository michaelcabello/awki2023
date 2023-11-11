<div>
    <div class="flex items-center justify-center">
        <button class="items-center justify-center sm:flex btn btn-orange" wire:click="$set('open',true)">
            <i class="mx-2 fa-regular fa-file"></i> Nuevo
        </button>

    </div>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Crear Nuevo Cliente
        </x-slot>

        <x-slot name="content">

            <div class="mb-4">
                <x-jet-label value="DNI" />
                <x-jet-input type="text" class="w-full" wire:model="dni" />
                <x-jet-input-error for="dni" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Nombres" />
                <x-jet-input type="text" class="w-full" wire:model="nombres" />
                <x-jet-input-error for="nombres" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Apellido Paterno" />
                <x-jet-input type="text" class="w-full" wire:model="apellidopaterno" />
                <x-jet-input-error for="apellidopaterno" />
            </div>
            <div class="mb-4">
                <x-jet-label value="Apellido Materno" />
                <x-jet-input type="text" class="w-full" wire:model="apellidomaterno" />
                <x-jet-input-error for="apellidomaterno" />
            </div>

            @if($user->hasRole('Admin'))

            <div class="mb-4">
                <x-jet-label value="Cuentas" />
                <select wire:model="awkirepresentada_id" class="py-0.7 rounded" style="height:100%; width:100%">
                    <option value="" selected disabled>Seleccione</option>
                    @foreach ($awkirepresentadas as $id => $razonsocial)
                        <option value="{{ $id }}">{{ $razonsocial }}</option>
                    @endforeach

                </select>
                <x-jet-input-error for="awkirepresentada_id" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Zonas" />
                <select wire:model="awkizona_id" class="py-0.7 rounded" style="height:100%; width:100%">
                    <option value="" selected disabled>Seleccione</option>
                    @foreach ($awkizonas as $zona)
                        <option value="{{ $zona->id }}">{{ $zona->name }}</option>
                    @endforeach

                </select>
                <x-jet-input-error for="awkizona_id" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Tienda" />
                <select wire:model="awkitienda_id" class="py-0.7 rounded" style="height:100%; width:100%">
                    <option value="" selected disabled>Seleccione</option>
                    @foreach ($awkitiendas as $tienda)
                        <option value="{{ $tienda->id }}">{{ $tienda->name }}</option>
                    @endforeach

                </select>
                <x-jet-input-error for="awkitienda_id" />
            </div>
            @else

            <div class="mb-4">
                <x-jet-label value="Tienda" />
                <select wire:model="awkitiendau_id" class="py-0.7 rounded" style="height:100%; width:100%">
                    <option value="" selected disabled>Seleccione</option>
                    @foreach ($user->tiendas as $tienda)
                        <option value="{{ $tienda->id }}">{{ $tienda->name }}</option>
                    @endforeach

                </select>
                <x-jet-input-error for="awkitiendau_id" />
            </div>
            {{ $awkitiendau_id }}
            @endif

            <div>
                <x-jet-label value="Estado" />
                <x-jet-input type="checkbox" wire:model="state" />
                <x-jet-input-error for="state" />
            </div>

        </x-slot>

        <x-slot name="footer">

            <x-jet-button wire:click="$set('open', false)" class="mr-2">
                <i class="mx-2 fa-sharp fa-solid fa-xmark"></i>Cancelar
                </x-jet-secondary-button>

                <x-jet-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save"
                    class="disabled:opacity-25">
                    <i class="mx-2 fa-regular fa-floppy-disk"></i> Guardar
                </x-jet-danger-button>

        </x-slot>

    </x-jet-dialog-modal>


</div>

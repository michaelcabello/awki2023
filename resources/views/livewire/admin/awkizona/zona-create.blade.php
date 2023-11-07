<div>
    <div class="flex items-center justify-center" >
        <button class="items-center justify-center sm:flex btn btn-orange" wire:click="$set('open',true)">
           <i class="mx-2 fa-regular fa-file"></i> Nuevo
        </button >

    </div>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Crear Nueva Zona
        </x-slot>

        <x-slot name="content">

            <div class="mb-4">
                <x-jet-label value="name" />
                <x-jet-input type="text" class="w-full" wire:model="name" />
                <x-jet-input-error for="name"/>
            </div>

            <div class="mb-4">
                <x-jet-label value="description" />
                <x-jet-input type="text" class="w-full" wire:model="description" />
                <x-jet-input-error for="description"/>
            </div>


            <div class="mb-4">
                <x-jet-label value="Empresa- Representadaa" />
                <select wire:model="awkirepresentada_id" class="py-0.7 rounded" style="height:100%; width:100%">
                     <option value="" selected disabled>Seleccione</option>
                    @foreach($awkirepresentadas as $id=>$razonsocial)
                    <option value="{{$id}}">{{$razonsocial}}</option>
                    @endforeach

                </select>
                <x-jet-input-error for="awkirepresentada_id" />
            </div>

            <div>
                <x-jet-label value="Estado" />
               <x-jet-input type="checkbox" wire:model="state" />
               <x-jet-input-error for="state"/>
           </div>

        </x-slot>

        <x-slot name="footer">

            <x-jet-button wire:click="$set('open', false)"  class="mr-2">
                <i class="mx-2 fa-sharp fa-solid fa-xmark"></i>Cancelar
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save" class="disabled:opacity-25">
                <i class="mx-2 fa-regular fa-floppy-disk"></i> Guardar
            </x-jet-danger-button>

        </x-slot>

    </x-jet-dialog-modal>


</div>

<div>
    <div class="flex items-center justify-center" >
        <button class="items-center justify-center sm:flex btn btn-orange" wire:click="$set('open',true)">
           <i class="mx-2 fa-regular fa-file"></i> Nuevo
        </button >

    </div>


    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Crear Nuevo Cliente
        </x-slot>

        <x-slot name="content">

            <div class="mb-4">
                <x-jet-label value="razonsocial" />
                <x-jet-input type="text" class="w-full" wire:model="razonsocial" />
                <x-jet-input-error for="razonsocial"/>
            </div>
            <div class="mb-4">
                <x-jet-label value="address" />
                <x-jet-input type="text" class="w-full" wire:model="address" />
                <x-jet-input-error for="address"/>
            </div>
            <div class="flex">
                <div class="mb-4 mr-1">
                    <x-jet-label value="ruc" />
                    <x-jet-input type="text" class="w-full" wire:model="ruc" />
                    <x-jet-input-error for="ruc"/>
                </div>



                <div class="mb-4 mr-1">
                    <x-jet-label value="phone" />
                    <x-jet-input type="text" class="w-full" wire:model="phone" />
                    <x-jet-input-error for="phone"/>
                </div>

                <div class="mb-4">
                    <x-jet-label value="movil" />
                    <x-jet-input type="text" class="w-full" wire:model="movil" />
                    <x-jet-input-error for="movil"/>
                </div>
            </div>



            <div class="mb-4">
                <x-jet-label value="nota1" />
                <x-jet-input type="text" class="w-full" wire:model="nota1" />
                <x-jet-input-error for="nota1"/>
            </div>

            <div class="mb-4">
                <x-jet-label value="nota2" />
                <x-jet-input type="text" class="w-full" wire:model="nota2" />
                <x-jet-input-error for="nota2"/>
            </div>



            <div class="mb-4">
                <x-jet-label value="Usuario" />
                <select wire:model="user_id" class="py-0.7 rounded" style="height:100%; width:100%">
                     <option value="" selected disabled>Seleccione</option>
                    @foreach($users as $id=>$user)
                    <option value="{{$id}}">{{$user}}</option>
                    @endforeach

                </select>
                <x-jet-input-error for="user_id" />
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

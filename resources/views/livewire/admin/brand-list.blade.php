<div>
{{-- <div wire:init="loadBrands"> --}}


    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="text-xl font-semibold leading-tight text-gray-600">
                Lista de Marcas
            </h2>
        </div

    </x-slot>

    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="container py-12 mx-auto border-gray-400 max-w-7xl sm:px-6 lg:px-8">



                <x-table>

                        <div class="items-center px-6 py-4 bg-gray-200 sm:flex">

                            <div class="flex items-center justify-center mb-2 md:mb-0">
                                <span>Mostrar </span>
                                <select wire:model="cant" class="block p-7 py-2.5 ml-3 mr-3 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                    <option value="10"> 10 </option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                                <span class="mr-3">registros</span>
                            </div>


                            <div class="flex items-center justify-center mb-2 mr-4 md:mb-0 sm:w-full">
                            <x-jet-input type="text"
                                wire:model="search"
                                class="flex items-center justify-center w-80 sm:w-full rounded-lg py-2.5"
                                placeholder="buscar" />
                            </div>



                            @can('create Brand')
                                @livewire('admin.brand-create')
                            @endcan

            {{--                 <div>
                                 <input type="checkbox" class="flex items-center mr-2 leading-tight" wire-model="state"> Activos
                            </div> --}}

                            <div class="flex items-center justify-center px-2 mt-2 mr-4 md:mt-0">

                                <x-jet-input type="checkbox" wire:model="state" class="mx-1" />
                                Activos
                            </div>

                        </div>



                        {{-- @if ($brands->count()) --}}


                        @if (count($brands))


                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                        <tr>

                                        <th scope="col"
                                            class="w-24 px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase cursor-pointer"
                                            wire:click="order('id')">

                                            ID

                                                @if ($sort == 'id')
                                                    @if ($direction == 'asc')
                                                    <i class="float-right mt-1 fas fa-sort-alpha-up-alt"></i>
                                                    @else
                                                    <i class="float-right mt-1 fas fa-sort-alpha-down-alt"></i>
                                                    @endif
                                                @else
                                                    <i class="float-right mt-1 fas fa-sort"></i>
                                                @endif
                                        </th>

                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase cursor-pointer"
                                            wire:click="order('name')">

                                            Modelo
                                            @if ($sort == 'name')
                                                @if ($direction == 'asc')
                                                <i class="float-right mt-1 fas fa-sort-alpha-up-alt"></i>
                                                @else
                                                <i class="float-right mt-1 fas fa-sort-alpha-down-alt"></i>
                                                @endif
                                            @else
                                                <i class="float-right mt-1 fas fa-sort"></i>
                                            @endif

                                        </th>


                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase cursor-pointer"
                                            wire:click="order('state')">
                                            Estado
                                            @if ($sort == 'state')
                                                @if ($direction == 'asc')
                                                <i class="float-right mt-1 fas fa-sort-alpha-up-alt"></i>
                                                @else
                                                <i class="float-right mt-1 fas fa-sort-alpha-down-alt"></i>
                                                @endif
                                            @else
                                                <i class="float-right mt-1 fas fa-sort"></i>
                                            @endif


                                        </th>

                                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-right text-gray-500 uppercase">
                                           ACCIONES
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">

                                    @foreach ($brands as $brandd)

                                        <tr>

                                            <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                {{$brandd->id}}
                                            </td>






                                            <td class="flex items-center px-6 py-4 text-sm text-gray-500 whitespace-nowrap">

                                                <div class="flex-shrink-0 h-10 w-15 ">
                                                    @if ($brandd->image)
                                                        <img class="object-cover w-20 h-10 rounded-sm" src="{{url($brandd->image) }}" alt="">
                                                            {{-- src="{{ Storage::url($brand->image) }}" storage//storage/brand/default.jpg  en la bd esta puesto esto 	/storage/brands/default.jpg > --}}
                                                            {{-- url($brand->image) muestra tal como es la ruta en la bd esta puesto esto 	/storage/brands/default.jpg --}}
                                                            {{--  {{ Storage::disk("s3")->url($brand->image) }} --}}
                                                    @else
                                                        <img class="object-cover w-10 h-10 rounded-full"
                                                            src="https://images.pexels.com/photos/4883800/pexels-photo-4883800.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
                                                    @endif
                                                </div>
                                                <div class="ml-4">
                                                    {{ $brandd->name }}
                                                </div>
                                            </td>



                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @switch($brandd->state)
                                                    @case(0)
                                                        <span wire:click="activar({{ $brandd }})"
                                                            class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full cursor-pointer">
                                                            inactivo
                                                        </span>
                                                    @break
                                                    @case(1)
                                                        <span wire:click="desactivar({{ $brandd }})"
                                                            class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full cursor-pointer">
                                                            activo
                                                        </span>
                                                    @break
                                                    @default

                                                @endswitch

                                            </td>




                                            <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                                {{-- <a class="btn btn-blue"><i class="fa-sharp fa-solid fa-eye"></i></a> --}}
                                                @can('update Brand')
                                                  <a wire:click="edit({{ $brandd }})" class="btn btn-green"><i class="fa-solid fa-pen-to-square"></i></a>
                                                @endcan
                                                @can('delete Brand')
                                                    <a class="btn btn-red" wire:click="$emit('deleteBrand', {{ $brandd->id }})" >
                                                    <i class="fa-solid fa-trash-can"></i>
                                                    </a>
                                                @endcan



                                            </td>
                                        </tr>

                                    @endforeach
                                    <!-- More people... -->
                                </tbody>
                            </table>




                            @if ($brands->hasPages())
                                <div class="px-6 py-4">
                                    {{ $brands->links() }}
                                </div>
                            @endif

                        @else


                            <div wire:init="loadBrands">

                            </div>


                            @if($readyToLoad)

                                <div class="px-6 py-4">
                                    <div class="flex items-center justify-center">
                                        No hay ningún registro coincidente
                                    </div>
                                </div>
                            @else

                                <div class="px-6 py-4">
                                    <div class="flex items-center justify-center">
                                        <svg class="w-10 h-10 animate-spin" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="blue">
                                            <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                            <path d="M304 48c0-26.5-21.5-48-48-48s-48 21.5-48 48s21.5 48 48 48s48-21.5 48-48zm0 416c0-26.5-21.5-48-48-48s-48 21.5-48 48s21.5 48 48 48s48-21.5 48-48zM48 304c26.5 0 48-21.5 48-48s-21.5-48-48-48s-48 21.5-48 48s21.5 48 48 48zm464-48c0-26.5-21.5-48-48-48s-48 21.5-48 48s21.5 48 48 48s48-21.5 48-48zM142.9 437c18.7-18.7 18.7-49.1 0-67.9s-49.1-18.7-67.9 0s-18.7 49.1 0 67.9s49.1 18.7 67.9 0zm0-294.2c18.7-18.7 18.7-49.1 0-67.9S93.7 56.2 75 75s-18.7 49.1 0 67.9s49.1 18.7 67.9 0zM369.1 437c18.7 18.7 49.1 18.7 67.9 0s18.7-49.1 0-67.9s-49.1-18.7-67.9 0s-18.7 49.1 0 67.9z"/>
                                        </svg>
                                    </div>
                                </div>

                                <div class="px-6 py-4">
                                    <div class="flex items-center justify-center">
                                        Cargando, espere un momento
                                    </div>
                                </div>

                            @endif




                        @endif





                    </x-table>

    </div>


    <x-slot name="footer">

            <h2 class="text-xl font-semibold leading-tight text-gray-600">
                Pie
            </h2>


    </x-slot>





    <x-jet-dialog-modal wire:model="open_edit">
        <x-slot name="title">
           Modificando la Marca
        </x-slot>

        <x-slot name="content">

            <div class="mb-4">
                <x-jet-label value="Marca" />
                <x-jet-input type="text" class="w-full" wire:model="brand.name" />
                <x-jet-input-error for="name"/>
            </div>

             <div class="mb-4">
                Estado
                <x-jet-input type="checkbox" wire:model="brand.state" />
                <x-jet-input-error for="state"/>
            </div>


            <div class="mb-4">
                <input type="file" wire:model="image" id="{{ $identificador }}">
                <x-jet-input-error for="image" />
            </div>

            <div wire:loading wire:target="image"
                class="relative px-4 py-3 text-red-700 bg-red-100 border border-red-400 rounded" role="alert">
                <strong class="font-bold">Cargando imagen!</strong>
                <span class="block sm:inline">Espere un momento.</span>

            </div>

            @if ($image)
                <img class="mb-4" src="{{ $image->temporaryUrl() }}" alt="">
            @elseif($brand->image)

                <img src="{{ url($brand->image) }}" alt="">
            @endif






        </x-slot>

        <x-slot name="footer">

            <x-jet-button wire:click="cancelar"  class="mr-2">
                <i class="mx-2 fa-sharp fa-solid fa-xmark"></i>Cancelar
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="update" wire:loading.attr="disabled" wire:target="image" class="disabled:opacity-25">
                <i class="mx-2 fa-regular fa-floppy-disk"></i> Guardar
            </x-jet-danger-button>

        </x-slot>

    </x-jet-dialog-modal>







    @push('scripts')

       <script src="sweetalert2.all.min.js"></script>


       <script>
        Livewire.on('deleteBrand', brandId => {
            Swal.fire({
                title: 'Estas seguro?',
                text: "No se podrá revertir!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Eliminar!'
            }).then((result) => {
                if (result.isConfirmed) {

                    Livewire.emitTo('admin.brand-list','delete',brandId);

                    Swal.fire(
                        'Eliminado!',
                        'El Registro fue eliminado.',
                        'success'
                    )
                }
            })
        })
        </script>





   @endpush



</div>



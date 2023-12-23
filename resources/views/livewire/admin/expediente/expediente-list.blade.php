<div wire:init="loadExpedientes">
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="text-xl font-semibold leading-tight text-gray-600">
                Lista de Expedientes

            </h2>
        </div </x-slot>

        <!-- This example requires Tailwind CSS v2.0+ -->
         <div class="py-12 mx-auto border-gray-400 max-w-8xl sm:px-6 lg:px-8">
       {{--  <div class="container w-full py-12 mx-auto border-gray-400 max-w-7xl sm:px-6 lg:px-8"> --}}
            <x-table>

                <div class="items-center px-6 py-4 bg-gray-200 sm:flex">

                    <div class="flex items-center justify-center mb-2 md:mb-0">
                        <span>Mostrar </span>
                        <select wire:model="cant"
                            class="block p-7 py-2.5 ml-3 mr-3 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                            <option value="10"> 10 </option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                        <span class="mr-3">registros</span>
                    </div>


                    <div class="flex items-center justify-center mb-2 mr-4 md:mb-0 sm:w-full">
                        <x-jet-input type="text" wire:model="search"
                            class="flex items-center justify-center w-80 sm:w-full rounded-lg py-2.5"
                            placeholder="buscar" />
                    </div>





                </div>


                @if (count($expedientes))

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
                                    class="w-24 px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase cursor-pointer"
                                    wire:click="order('dni')">
                                    DNI
                                    @if ($sort == 'dni')
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
                                    class="w-24 px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase cursor-pointer"
                                    wire:click="order('cliente_name')">
                                    CLIENTES
                                    @if ($sort == 'cliente_name')
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
                                    wire:click="order('tienda_name')">
                                    TIENDA
                                    @if ($sort == 'tienda_name')
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
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase "
                                    >
                                    GESTOR


                                </th>


                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase cursor-pointer"
                                    wire:click="order('numdocumento')">
                                    NUM DOCUMENTO B/F
                                    @if ($sort == 'numdocumento')
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
                                    class="w-24 px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase cursor-pointer"
                                    wire:click="order('titulo')">
                                    TITULO
                                    @if ($sort == 'titulo')
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
                                    class="w-24 px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase cursor-pointer"
                                    wire:click="order('codigodeverificacion')">
                                    CODIGO DE VERIFICACION
                                    @if ($sort == 'codigodeverificacion')
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
                                    class="w-24 px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                                    >
                                    TIPO VENTA

                                </th>

                                <th scope="col"
                                    class="w-24 px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase cursor-pointer"
                                    wire:click="order('numerodeplaca')">
                                    PLACA
                                    @if ($sort == 'numerodeplaca')
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
                                    class="w-24 px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                                    >
                                    CATEGORIA

                                </th>


                                <th scope="col"
                                    class="w-24 px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase cursor-pointer"
                                    wire:click="order('certificado')">
                                    CERTIFICADO
                                    @if ($sort == 'certificado')
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
                                    class="w-24 px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                                    >
                                    STATUS FINAL

                                </th>

                                {{-- <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase cursor-pointer"
                                    wire:click="order('name')">
                                    FECHA VENTA
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
                                    wire:click="order('name')">

                                    FECHA RECEPCIÓN
                                    @if ($sort == 'name')
                                        @if ($direction == 'asc')
                                            <i class="float-right mt-1 fas fa-sort-alpha-up-alt"></i>
                                        @else
                                            <i class="float-right mt-1 fas fa-sort-alpha-down-alt"></i>
                                        @endif
                                    @else
                                        <i class="float-right mt-1 fas fa-sort"></i>
                                    @endif

                                </th> --}}




                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-right text-gray-500 uppercase">
                                    ACCIONES
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">

                            @foreach ($expedientes as $expedientee)
                                <tr>

                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                        {{ $expedientee->id }}
                                    </td>

                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                        {{ $expedientee->cliente_dni  }}
                                    </td>

                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                        {{ $expedientee->cliente_name ." ". $expedientee->cliente_apaterno ." ". $expedientee->cliente_amaterno }}
                                    </td>

                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                        {{ $expedientee->tienda_name }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                        {{ $expedientee->gestor_name }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                        {{ $expedientee->numdocumento }}
                                    </td>

                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                        {{ $expedientee->titulo }}
                                    </td>

                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                        {{ $expedientee->codigodeverificacion }}
                                    </td>


                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                        @if($expedientee->tipodeventa)
                                            {{ $expedientee->tipodeventa->nombre }}
                                        @endif

                                    </td>

                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                        {{ $expedientee->numerodeplaca }}
                                    </td>

                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                        @if($expedientee->categoria)
                                            {{ $expedientee->categoria->nombre }}
                                        @endif
                                        {{-- {{ $expedientee->categoria_id }} --}}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                        {{ $expedientee->certificado }}
                                    </td>

                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                        {{-- {{ $expedientee->statusfinal_id }} --}}
                                        @if($expedientee->statusfinall)
                                            {{ $expedientee->statusfinall->nombre }}
                                        @endif
                                    </td>

                                    <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                        {{-- <a wire:click="edit({{ $expedientee }})" class="btn btn-blue">Crear</a> --}}

                                        {{--  <a href="{{ route('admin.expediente.create', $expedientee->id) }}"
                                        class="btn btn-orange">
                                        <i class="mx-2 fa-regular fa-file"></i></a> --}}
                                        {{-- @can('Zona Update') --}}
                                        <a href="{{ route('admin.expediente.edit', $expedientee) }}"
                                            class="btn btn-green"><i class="fa-solid fa-pen-to-square"></i></a>
                                        {{-- @endcan --}}
                                        {{-- @can('Zona Delete')
                                            <a class="btn btn-red" wire:click="$emit('deleteZona', {{ $expedientee->id }})">
                                                <i class="fa-solid fa-trash-can"></i>

                                            </a>
                                        @endcan  --}}

                                    </td>
                                </tr>
                            @endforeach
                            <!-- More people... -->
                        </tbody>
                    </table>







                    @if ($expedientes->hasPages())
                        <div class="px-6 py-4">
                            {{ $expedientes->links() }}
                        </div>
                    @endif
                @else
                    <div class="px-6 py-4">

                        <div class="flex items-center justify-center">
                            <svg class="w-10 h-10 animate-spin" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512" fill="blue">
                                <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                <path
                                    d="M304 48c0-26.5-21.5-48-48-48s-48 21.5-48 48s21.5 48 48 48s48-21.5 48-48zm0 416c0-26.5-21.5-48-48-48s-48 21.5-48 48s21.5 48 48 48s48-21.5 48-48zM48 304c26.5 0 48-21.5 48-48s-21.5-48-48-48s-48 21.5-48 48s21.5 48 48 48zm464-48c0-26.5-21.5-48-48-48s-48 21.5-48 48s21.5 48 48 48s48-21.5 48-48zM142.9 437c18.7-18.7 18.7-49.1 0-67.9s-49.1-18.7-67.9 0s-18.7 49.1 0 67.9s49.1 18.7 67.9 0zm0-294.2c18.7-18.7 18.7-49.1 0-67.9S93.7 56.2 75 75s-18.7 49.1 0 67.9s49.1 18.7 67.9 0zM369.1 437c18.7 18.7 49.1 18.7 67.9 0s18.7-49.1 0-67.9s-49.1-18.7-67.9 0s-18.7 49.1 0 67.9z" />
                            </svg>
                        </div>



                    </div>

                @endif






            </x-table>

        </div>

        <x-slot name="footer">

            {{--             <h2 class="text-xl font-semibold leading-tight text-gray-600">
                Lista de expedientes
            </h2> --}}


        </x-slot>



        {{--         <x-jet-dialog-modal wire:model="open_edit">
            <x-slot name="title">
                Modificando la Zona
            </x-slot>

            <x-slot name="content">


                <div class="mb-4">
                    <x-jet-label value="Nombre" />
                    <x-jet-input type="text" class="w-full" wire:model="awkizona.name" />
                    <x-jet-input-error for="awkizona.name" />
                </div>

                <div class="mb-4">
                    <x-jet-label value="Descripción" />
                    <x-jet-input type="text" class="w-full" wire:model="awkizona.description" />
                    <x-jet-input-error for="awkizona.description" />
                </div>

                <div class="mb-4">
                    <x-jet-label value="Empresa- Representadaa" />
                    <select wire:model="awkizona.awkirepresentada_id" class="py-0.7 rounded"
                        style="height:100%; width:100%">
                        <option value="" selected disabled>Seleccione</option>
                        @foreach ($awkirepresentadas as $id => $razonsocial)
                            <option value="{{ $id }}">{{ $razonsocial }}</option>
                        @endforeach

                    </select>
                    <x-jet-input-error for="awkizona.awkirepresentada_id" />
                </div>


                <div>
                    <x-jet-label value="Estado" />
                    <x-jet-input type="checkbox" wire:model="awkizona.state" />
                    <x-jet-input-error for="awkizona.state" />
                </div>

            </x-slot>

            <x-slot name="footer">

                <x-jet-button wire:click="$set('open_edit', false)" class="mr-2">
                    <i class="mx-2 fa-sharp fa-solid fa-xmark"></i>Cancelar
                    </x-jet-secondary-button>

                    <x-jet-danger-button wire:click="update" wire:loading.attr="disabled" wire:target="save"
                        class="disabled:opacity-25">
                        <i class="mx-2 fa-regular fa-floppy-disk"></i> Guardar
                    </x-jet-danger-button>

            </x-slot>

        </x-jet-dialog-modal> --}}


</div>

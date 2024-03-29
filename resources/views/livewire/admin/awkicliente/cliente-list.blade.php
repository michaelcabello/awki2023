<div wire:init="loadClientes">
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="text-xl font-semibold leading-tight text-gray-600">
                Lista de Clientes

            </h2>
        </div </x-slot>

        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="container py-12 mx-auto border-gray-400 max-w-7xl sm:px-6 lg:px-8">



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



                    @can('Cliente Create')
                        @livewire('admin.awkicliente.cliente-create')
                    @endcan
                    {{--                 <div>
                         <input type="checkbox" class="flex items-center mr-2 leading-tight" wire-model="state"> Activos
                    </div> --}}

                    {{-- <div class="flex items-center justify-center px-2 mt-2 mr-4 md:mt-0">

                        <x-jet-input type="checkbox" wire:model="state" class="mx-1" />
                        Activos
                    </div> --}}

                </div>



                @if (count($clientes))

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
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase cursor-pointer"
                                    wire:click="order('nombres')">
                                    Nombres
                                    @if ($sort == 'nombres')
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
                                    wire:click="order('apellidopaterno')">
                                    Apellido Paterno
                                    @if ($sort == 'apellidopaterno')
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
                                    wire:click="order('apellidomaterno')">
                                    Apellido Materno
                                    @if ($sort == 'apellidomaterno')
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

                                    Tienda
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
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase cursor-pointer"
                                    wire:click="order('razonsocial')">

                                    Cuenta
                                    @if ($sort == 'razonsocial')
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

                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-right text-gray-500 uppercase">
                                    ACCIONES
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">

                            @foreach ($clientes as $clientee)
                                <tr>

                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                        {{ $clientee->id }}
                                    </td>

                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                        {{ $clientee->dni }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                        {{ $clientee->nombres }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                        {{ $clientee->apellidopaterno }}
                                    </td>

                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                        {{ $clientee->apellidomaterno }}
                                    </td>

                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                        {{ $clientee->tienda_name }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                        {{ $clientee->razonsocial }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @switch($clientee->state)
                                            @case(0)
                                                <span wire:click="activar({{ $clientee }})"
                                                    class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full cursor-pointer">
                                                    inactivo
                                                </span>
                                            @break

                                            @case(1)
                                                <span wire:click="desactivar({{ $clientee }})"
                                                    class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full cursor-pointer">
                                                    activo
                                                </span>
                                            @break

                                            @default
                                        @endswitch

                                    </td>



                                    <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                        {{-- <a wire:click="edit({{ $clientee }})" class="btn btn-blue">Crear</a> --}}
                                        @can('Cliente Update')
                                        <a href="{{ route('expediente.list.user', $clientee->id) }}"
                                            class="btn btn-blue">
                                            <i class="fa-sharp fa-solid fa-eye"></i></a>

                                        @endcan

                                        @can('Cliente Update')
                                        <a href="{{ route('admin.expediente.create', $clientee->id) }}"
                                            class="btn btn-orange">
                                            <i class="fa-regular fa-file"></i></a>
                                        @endcan
                                        @can('Cliente Update')
                                            <a wire:click="edit({{ $clientee }})" class="btn btn-green"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
                                        @endcan

                                        {{-- @can('Cliente Delete')
                                            <a class="btn btn-red"
                                                wire:click="$emit('deleteCliente', {{ $clientee->id }})">
                                                <i class="fa-solid fa-trash-can"></i>

                                            </a>
                                        @endcan --}}

                                    </td>
                                </tr>
                            @endforeach
                            <!-- More people... -->
                        </tbody>
                    </table>



                    @if ($clientes->hasPages())
                        <div class="px-6 py-4">
                            {{ $clientes->links() }}
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
                Lista de clientes
            </h2> --}}


        </x-slot>



        <x-jet-dialog-modal wire:model="open_edit">
            <x-slot name="title">
                Editando Cliente
            </x-slot>

            <x-slot name="content">

                <div class="mb-4">
                    <x-jet-label value="DNI" />
                    <x-jet-input type="text" class="w-full" wire:model="awkicliente.dni" />
                    <x-jet-input-error for="dni" />
                </div>

                <div class="mb-4">
                    <x-jet-label value="Nombres" />
                    <x-jet-input type="text" class="w-full" wire:model="awkicliente.nombres" />
                    <x-jet-input-error for="nombres" />
                </div>

                <div class="mb-4">
                    <x-jet-label value="Apellido Paterno" />
                    <x-jet-input type="text" class="w-full" wire:model="awkicliente.apellidopaterno" />
                    <x-jet-input-error for="apellidopaterno" />
                </div>
                <div class="mb-4">
                    <x-jet-label value="Apellido Materno" />
                    <x-jet-input type="text" class="w-full" wire:model="awkicliente.apellidomaterno" />
                    <x-jet-input-error for="apellidomaterno" />
                </div>

                @if ($user->hasRole('Admin'))

                    <div class="mb-4">
                        <x-jet-label value="Cuentas" />
                        <select wire:model="awkicliente.awkirepresentada_id" class="py-0.7 rounded"
                            style="height:100%; width:100%">
                            <option value="" selected disabled>Seleccione</option>
                            @foreach ($awkirepresentadas as $id => $razonsocial)
                                <option value="{{ $id }}">{{ $razonsocial }}</option>
                            @endforeach

                        </select>
                        <x-jet-input-error for="awkicliente.awkirepresentada_id" />
                    </div>

                    <div class="mb-4">
                        <x-jet-label value="Zonas" />
                        <select wire:model="awkicliente.awkizona_id" class="py-0.7 rounded"
                            style="height:100%; width:100%">
                            <option value="" selected disabled>Seleccione</option>
                            @foreach ($awkizonas as $zona)
                                <option value="{{ $zona->id }}">{{ $zona->name }}</option>
                            @endforeach

                        </select>
                        <x-jet-input-error for="awkicliente.awkizona_id" />
                    </div>

                    <div class="mb-4">
                        <x-jet-label value="Tienda" />
                        <select wire:model="awkicliente.awkitienda_id" class="py-0.7 rounded"
                            style="height:100%; width:100%">
                            <option value="" selected disabled>Seleccione</option>
                            @foreach ($awkitiendas as $tienda)
                                <option value="{{ $tienda->id }}">{{ $tienda->name }}</option>
                            @endforeach

                        </select>
                        <x-jet-input-error for="awkicliente.awkitienda_id" />
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
                    <x-jet-input type="checkbox" wire:model="awkicliente.state" />
                    <x-jet-input-error for="state" />
                </div>

            </x-slot>

            <x-slot name="footer">

                {{-- <x-jet-button wire:click="$set('open', false)" class="mr-2"> --}}
                <x-jet-button wire:click="cancel" class="mr-2">
                    <i class="mx-2 fa-sharp fa-solid fa-xmark"></i>Cancelar
                </x-jet-button>

                <x-jet-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save"
                    class="disabled:opacity-25">
                    <i class="mx-2 fa-regular fa-floppy-disk"></i> Guardar
                </x-jet-danger-button>

            </x-slot>

        </x-jet-dialog-modal>



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

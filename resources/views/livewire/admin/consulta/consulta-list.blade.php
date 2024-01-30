<div>
    {{-- @dump($filters) --}}
    <x-slot name="header">
        <div class="flex items-center">
            {{-- <h2 class="text-xl font-semibold leading-tight text-gray-600">
                Lista de Zonas
            </h2> --}}

            {{--  <div class="mb-4">
                <x-jet-label value="Tienda" />
                <select wire:model="awkitienda_id" name="awkitienda_id" class="py-0.7 rounded"
                    style="height:100%; width:100%">
                    <option value="" selected disabled>Seleccione</option>

                    @foreach ($awkitiendas as $id => $awkitienda)
                        <option value="{{ $id }}">{{ $awkitienda }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="awkitienda_id" />

            </div> --}}

        </div>
    </x-slot>
    {{-- {{ $awkitienda_id }} --}}
    {{-- @dump($awkitienda_id) --}}
    {{-- <div class="container py-12 mx-auto border-gray-400 max-w-7xl sm:px-6 lg:px-8"> --}}
    <div class="py-12 mx-auto border-gray-400 max-w-8xl sm:px-6 lg:px-8">
        {{-- <h1>{{ $expedientes }}</h1> --}}
        <div class="mb-6 bg-white">
            <div class="flex">
                {{-- <div class="mb-4 ml-2 mr-2">
                    <div>
                        <x-jet-label value="Seleccione" />
                    </div>
                    <div>
                        <div>
                            <x-jet-label value="Tienda" />
                        </div>
                        <select wire:model="filters.tienda" name="awkitienda_id" class="py-0.4 rounded">
                            <option value="" selected disabled>Seleccione</option>

                            @foreach ($awkitiendas as $id => $awkitienda)
                                <option value="{{ $id }}">{{ $awkitienda }}</option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="awkitienda_id" />
                    </div>
                </div>
 --}}



                <div class="grid px-4 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-3 gap-x-6">
                    {{-- cuentas representadas --}}
                    <div>
                        <x-jet-label value="Representada Cuenta" />

                        <select class="w-full form-control" wire:model="filters.awkirepresentada_id">

                            <option value="" selected>Seleccione una Cuenta</option>

                            @foreach ($awkirepresentadas as $id => $awkirepresentada)
                                <option value="{{ $id }}">{{ $awkirepresentada }}</option>
                            @endforeach
                        </select>

                        <x-jet-input-error for="filters.awkirepresentada_id" />
                    </div>

                    {{-- zonas --}}
                    @if ($awkizonas)
                        <div>
                            <x-jet-label value="Zonas" />

                            <select class="w-full form-control" wire:model="filters.awkizona_id">

                                <option value="" disabled selected>Seleccione una Zona</option>

                                @foreach ($awkizonas as $awkizona)
                                    <option value="{{ $awkizona->id }}">{{ $awkizona->name }}</option>
                                @endforeach
                            </select>

                            <x-jet-input-error for="filters.awkizona_id" />
                        </div>
                    @endif



                    {{-- tiendas --}}
                    @if ($awkitiendas)
                        <div>
                            <x-jet-label value="Tiendas" />

                            <select class="w-full form-control" wire:model="filters.awkitienda_id">

                                <option value="" disabled selected>Seleccione una tienda</option>

                                @foreach ($awkitiendas as $awkitienda)
                                    <option value="{{ $awkitienda->id }}">{{ $awkitienda->name }}</option>
                                @endforeach
                            </select>

                            <x-jet-input-error for="filters.awkitienda_id" />
                        </div>
                    @endif
                </div>








                <div class="mb-4 ml-2 mr-2">
                    <div>
                        <x-jet-label value="Status" />
                    </div>
                    <div>
                        <div>
                            <x-jet-label value="Final" />
                        </div>

                        {{-- <select wire:model="awkitienda_id" name="awkitienda_id" class="py-0.7 rounded" --}}
                        <select wire:model="filters.status" name="statusfinal_id" class="py-0.4 rounded">
                            <option value="" selected disabled>Seleccione</option>

                            @foreach ($statusfinals as $id => $statusfinal)
                                <option value="{{ $id }}">{{ $statusfinal }}</option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="statusfinal_id" />
                    </div>



                </div>


                <div>
                    <div>
                        <x-jet-label value="Fecha de venta:" />
                    </div>
                    <div class="flex">

                        <div wire:model="filters.fromdate" class="mb-4 mr-2">
                            <x-jet-label value="Desde" />
                            <x-jet-input type="date" class="w-30" wire:model.lazy="filters.fromdate" />
                        </div>

                        <div wire:model="filters.todate" class="mb-4 mr-2">
                            <x-jet-label value="Hasta" />
                            <x-jet-input type="date" class="w-30" wire:model.lazy="filters.todate" />
                        </div>
                    </div>
                </div>


                <div>
                    <div>
                        <x-jet-label value="Fecha de Ingreso:" />
                    </div>

                    <div class="flex">
                        <div wire:model="filters.fromdaterecepcion" class="mb-4 mr-2">
                            <x-jet-label value="Desde" />
                            <x-jet-input type="date" class="w-30" wire:model.lazy="filters.fromdaterecepcion" />
                        </div>

                        <div wire:model="filters.todaterecepcion" class="mb-4 mr-2">
                            <x-jet-label value="Hasta" />
                            <x-jet-input type="date" class="w-30" wire:model.lazy="filters.todaterecepcion" />
                        </div>
                    </div>
                </div>

                <div class="mt-6">
                    <x-jet-button wire:click="generateReport">
                        Generar Reporte
                    </x-jet-button>
                </div>




            </div>
        </div>

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
                        wire:click="order('id')">
                        DNI
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
                        wire:click="order('id')">
                        CLIENTES
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
                        TIENDA
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
                        NUM DOCUMENTO B/F
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
                        class="w-24 px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase cursor-pointer"
                        wire:click="order('id')">
                        TITULO
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
                        wire:click="order('id')">
                        CODIGO DE VERIFICACION
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
                        wire:click="order('id')">
                        TIPO VENTA
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
                        wire:click="order('id')">
                        PLACA
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
                        wire:click="order('id')">
                        CATEGORIA
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
                        wire:click="order('id')">
                        CERTIFICADO
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
                        wire:click="order('id')">
                        STATUS FINAL
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
            @if ($expedientes)

                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($expedientes as $expedientee)
                        <tr>

                            <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                {{ $expedientee->id }}
                            </td>

                            <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                @if ($expedientee->awkicliente->dni)
                                    {{ $expedientee->awkicliente->dni }}
                                @endif

                            </td>

                            <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                {{ $expedientee->awkicliente->nombres . ' ' . $expedientee->awkicliente->apellidopaterno . ' ' . $expedientee->awkicliente->apellidomaterno }}

                            </td>

                            <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                {{ $expedientee->awkitienda->name }}
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
                                {{-- {{ $expedientee->tipodeventa_id }} --}}
                                {{-- {{ $expedientee->tipodeventa_id === 1 ? 'FACTURA' : ($expedientee->tipodeventa_id === 2 ? 'BOLETA' : 'OTRO') }} --}}
                                @if ($expedientee->tipodeventa)
                                    {{ $expedientee->tipodeventa->nombre }}
                                @endif

                            </td>

                            <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                {{ $expedientee->numerodeplaca }}
                            </td>

                            <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                {{ $expedientee->categoria->nombre ?? '' }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                {{ $expedientee->certificado }}
                            </td>

                            <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                {{ $expedientee->statusfinall->nombre ?? '' }}
                            </td>

                            <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                {{-- <a wire:click="edit({{ $expedientee }})" class="btn btn-blue">Crear</a> --}}

                                {{--  <a href="{{ route('admin.expediente.create', $expedientee->id) }}"
                            class="btn btn-orange">
                            <i class="mx-2 fa-regular fa-file"></i></a> --}}
                                {{-- @can('Zona Update') --}}
                                <a href="{{ route('admin.expediente.edit', $expedientee) }}" class="btn btn-green"><i
                                        class="fa-solid fa-pen-to-square"></i></a>
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
                    {{-- @if ($expedientes->hasPages())

                @endif --}}





                </tbody>


            @endif
        </table>

        @if ($expedientes->hasPages())
            <div class="px-6 py-4">
                {{ $expedientes->links() }}
            </div>
        @endif


    </div>







</div>

<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Compras') }}
        </h2>
    </x-slot>

    {{-- <form method="POST" action="{{ route('admin.shopping.store') }}" enctype="multipart/form-data"> --}}
        {{-- {{ csrf_field() }} --}}
        <div class="grid px-4 mx-auto mt-4 max-w-7xl sm:px-6 lg:px-8 ">

            <div class="px-3 bg-white">

                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div>

                            <h3 class="mt-2 mb-5 text-center underline">Nueva Compra</h3>


                            {{-- <div class="py-2 mb-1" wire:ignore> --}}
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-6 lg:grid-cols-6">
                                <div class="mb-4 mr-4 ">
                                    {{-- <label>Proveedores </label> --}}
                                    <x-jet-label value="Cliente" />
                                    {{-- select2 --}}
                                    <select wire:model="supplier_id"
                                        class="h-10 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 "
                                        data-placeholder="Selecccione un Proveedor" style="width:100%">
                                        <option value="" selected disabled>Seleccione</option>
                                        @foreach ($suppliers as $supplier)
                                            <option value="{{ $supplier->id }}">{{ $supplier->nomrazonsocial }}</option>
                                        @endforeach

                                    </select>
                                    <x-jet-input-error for="supplier_id" />
                                </div>

                                <div class="mb-4 mr-4" wire:ignore >
                                    <x-jet-label value="Fecha de Venta" />
                                    <x-jet-input id="datepicker" wire:model="fechaemision" type="text" class="w-full h-10"
                                        value="{{ old('fechaemision') }}" placeholder="fecha de compra" />
                                    <x-jet-input-error for="fechaemision" />
                                </div>


                                <div class="mb-4 mr-4">
                                    <x-jet-label value="Fecha de Recepción:" />
                                    <x-jet-input id="datepicker2" type="text" wire:model="fechavencimiento"
                                        value="{{ old('fechavencimiento') }}" placeholder="fecha de pago"
                                        class="w-full" />
                                    <x-jet-input-error for="fechavencimiento" />
                                </div>



                                <div class="mb-1 mr-4">
                                    <x-jet-label value="Forma de pago:" />

                                    <select wire:model="formadepago"
                                        class="h-10 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        data-placeholder="Selecccione forma de pago" style="width:100%">
                                        <option value="" selected disabled>Seleccione</option>

                                        <option value="Contado">Contado</option>

                                        <option value="Credito">Credito</option>
                                    </select>
                                    <x-jet-input-error for="formadepago" />
                                </div>



                                <div class="mb-1 mr-4">
                                    <x-jet-label value="Tipo Comprobante" />
                                    <select wire:model="tipocomprobante_id"
                                        class="h-10 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        data-placeholder="Selecccione la moneda" style="width:100%">
                                        <option value="" selected disabled>Seleccione</option>
                                        @foreach ($tipocomprobantes as $tipocomprobante)
                                            <option value="{{ $tipocomprobante->id }}">{{ $tipocomprobante->name }}
                                            </option>
                                        @endforeach

                                    </select>
                                    <x-jet-input-error for="supplier_id" />


                                </div>


                                <div class="mb-1 mr-4">
                                    <x-jet-label value="Serie-Numero" />
                                    <x-jet-input type="text" placeholder="Serie - Número" class="w-full h-10 uppercase"
                                        wire:model="serienumero" />
                                    <x-jet-input-error for="serienumero" />
                                </div>


                                <div class="mb-1 mr-4">
                                    <x-jet-label value="Moneda" />
                                    <select wire:model="currency_id"
                                        class="h-10 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        data-placeholder="Selecccione la moneda" style="width:100%">
                                        <option value="" selected disabled>Seleccione</option>
                                        @foreach ($currencies as $currency)
                                            <option value="{{ $currency->id }}">{{ $currency->name }}</option>
                                        @endforeach

                                    </select>
                                    <x-jet-input-error for="currency_id" />
                                </div>


                                <div class="col-span-2 mr-4">
                                    <x-jet-label value="Imagen del comprobante" />
                                    {{-- <label>Imagen del comprobante</label> --}}
                                    <input type="file" wire:model="photo" id="file" accept="image/*">
                                </div>

                                <div class="col-span-2 form-group {{ $errors->has('nota') ? 'text-danger' : '' }} ">
                                    {{-- <label>Nota de la compra</label> --}}
                                    <textarea rows="2" wire:model="nota" class="w-full form-control"
                                        placeholder="Ingrese Nota del Comprobante ">{{ old('nota') }}</textarea>
                                    {!! $errors->first('nota', '<span class="help-block">:message</span>') !!}


                                </div>


                            </div>


                            <hr class="mt-5 mb-5">
                            {{-- aqui ira los productos a comprar --}}

















                             <div>

                                <x-jet-danger-button class="w-full mt-4 mb-3" wire:click="save">
                                    <i class="mx-2 fa-regular fa-floppy-disk"></i> Crear Compra
                                </x-jet-danger-button>

                            </div>



                        </div>
                    </div>

                </div>



            </div>
        </div>
    {{-- </form> --}}







    @push('styles')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
    @endpush

    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.slim.js"></script>
        <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
        {{--  <script src="/adminlte/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script> --}}

        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
        <script src="pikaday.js"></script>


        <script>
             var datepicker = new Pikaday({
        field: document.getElementById('datepicker'),
        format: 'D MMM YYYY',
        onSelect: function(selectedDate) {
            Livewire.emit('fechaSeleccionada', selectedDate);
        }
    });


        </script>



        <script>
            /*  $('#datepicker').datepicker({
                                autoclose: true
                            }); */




            $('.select2').select2({
                tags: true
            });
        </script>

        <script>
            CKEDITOR.replace('editor');
            CKEDITOR.config.height = 115;
        </script>


    @endpush
</div>

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Editando Expediente') }}
        </h2>
    </x-slot>


    <form method="POST" action="{{ route('admin.expediente.update', $expedientee) }} " enctype="multipart/form-data">
        {{ csrf_field() }} {{ method_field('PUT') }}
        <div
            class="grid grid-cols-1 px-4 mx-auto mt-4 sm:px-6 lg:px-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">

            <div class="px-3 bg-white">

                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div>
                            <h3 class="mt-4 text-center profile-username">Datos del Cliente</h3>
                            <div class="hidden mt-4 mb-4">
                                <x-jet-label value="ID:" />
                                <x-jet-input type="text" name="awkicliente_id"
                                    value="{{ $expedientee->awkicliente_id }}" readonly class="w-full" />
                                <x-jet-input type="text" name="awkitienda_id"
                                    value="{{ $expedientee->awkitienda_id }}" readonly class="w-full" />
                                <x-jet-input type="text" name="awkizona_id" value="{{ $expedientee->awkizona_id }}"
                                    readonly class="w-full" />

                            </div>

                            <div class="mt-4 mb-4">
                                <x-jet-label value="DNI:" />
                                <x-jet-input type="text" name="dni" value="{{ $clientee->dni }}" readonly
                                    class="w-full" />
                                {{-- <x-jet-input-error for="dni" /> --}}
                            </div>

                            <div class="mb-4">
                                <x-jet-label value="Nombres:" />
                                <x-jet-input type="text" name="nombres"
                                    value="{{ $clientee->nombres . ' ' . $clientee->apellidopaterno . ' ' . $clientee->apellidomaterno }}"
                                    readonly class="w-full" />
                                {{--   <x-jet-input-error for="nombres" /> --}}
                            </div>

                            <div class="mb-4">
                                <x-jet-label value="Tienda:" />
                                <x-jet-input type="text" name="tienda" value="{{ $clientee->awkitienda->name }}"
                                    readonly class="w-full" />
                                {{-- <x-jet-input-error for="tienda" /> --}}
                            </div>

                            <div class="mb-4">
                                <x-jet-label value="Zona:" />
                                <x-jet-input type="text" name="zona" value="{{ $clientee->awkizona->name }}"
                                    readonly class="w-full" />
                                {{-- <x-jet-input-error for="zona" /> --}}
                            </div>


                            <div class="mb-4">
                                <x-jet-label value="Tipo Documento" />
                                <select name="tipodedocumento_id" class="py-0.7 rounded"
                                    style="height:100%; width:100%">
                                    <option value="" selected disabled>Seleccione</option>
                                    @foreach ($tipodedocumentos as $id => $tipodedocumento)
                                        <option value="{{ $id }}"
                                            {{ old('tipodedocumento_id', $expedientee->tipodedocumento_id) == $id ? 'selected' : '' }}>
                                            {{ $tipodedocumento }}</option>
                                    @endforeach
                                </select>
                                <x-jet-input-error for="tipodedocumento_id" />

                            </div>
                            {{-- <div class="flex"> --}}
                            {{--  <div class="mb-4 mr-2">
                                    <x-jet-label value="Serie" />
                                    <x-jet-input type="text" name="numdocumento"
                                        value="{{ $clientee->awkitienda->serief }}  {{ $clientee->awkitienda->serieb }}"
                                        class="w-full" readonly />
                                    <x-jet-input-error for="numdocumento" />
                                </div> --}}

                            <div class="mb-4">
                                <x-jet-label value="Número de Documento:" />
                                <x-jet-input type="text" name="numdocumento"
                                    value="{{ old('numdocumento', $expedientee->numdocumento) }}" class="w-full" />
                                <x-jet-input-error for="numdocumento" />
                            </div>
                            {{-- </div> --}}

                            <div class="mb-4">
                                <x-jet-label value="Fecha de Venta:" />

                                <x-jet-input type="text" id="datepicker" name="fechaventa" {{-- value="{{ old('fechaventa', \Carbon\Carbon::parse($expedientee->fechaventa)->format('d-m-Y')) }}" --}}
                                    value="{{ old('fechaventa', $expedientee->fechaventa ?? '') }}" class="w-full" />
                                <x-jet-input-error for="fechaventa" />
                            </div>


                            <div class="mb-4">
                                <x-jet-label value="Fecha de Recepción:" />

                                <x-jet-input type="text" id="datepicker2" name="fecharecepcion" {{-- value="{{ old('fecharecepcion', \Carbon\Carbon::parse($expedientee->fecharecepcion)->format('d-m-Y')) }}" --}}
                                    value="{{ old('fecharecepcion', $expedientee->fecharecepcion ?? '') }}"
                                    class="w-full" />
                                <x-jet-input-error for="fecharecepcion" />
                            </div>

                            <div class="mb-4">
                                <x-jet-label value="Pago Administrativo:" />
                                <x-jet-input type="text" name="pagoadministrativo"
                                    value="{{ old('pagoadministrativo', $expedientee->pagoadministrativo) }}"
                                    class="w-full" />
                                <x-jet-input-error for="pagoadministrativo" />
                            </div>

                            <div class="mb-4">
                                <x-jet-label value="Tipo de venta" />
                                <select name="tipodeventa_id" class="py-0.7 rounded" style="height:100%; width:100%">
                                    <option value="" selected disabled>Seleccione</option>
                                    @foreach ($tipodeventas as $id => $tipodeventa)
                                        <option value="{{ $id }}"
                                            {{ old('tipodeventa_id', $expedientee->tipodeventa_id) == $id ? 'selected' : '' }}>
                                            {{ $tipodeventa }}</option>
                                    @endforeach

                                </select>
                                <x-jet-input-error for="tipodeventa_id" />
                                {{-- {!! $errors->first('category_id','<span class="help-block">:message</span>') !!} --}}
                            </div>


                            <div class="mb-4">
                                <x-jet-label value="Monto de la Compra:" />
                                <x-jet-input type="text" name="montodelacompra"
                                    value="{{ old('montodelacompra', $expedientee->montodelacompra) }}"
                                    class="w-full" />
                                <x-jet-input-error for="montodelacompra" />
                            </div>


                            <hr>



                            <x-jet-danger-button class="w-full mt-4 mb-3" type="submit">
                                <i class="mx-2 fa-regular fa-floppy-disk"></i> Guardar
                            </x-jet-danger-button>





                        </div>
                    </div>
                </div>

            </div>

            <div class="px-3 bg-white">

                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div>
                            <h3 class="mt-4 text-center profile-username">Datos del Vehiculo</h3>

                            <div class="mt-4 mb-4">
                                <x-jet-label value="Marca" />
                                <select name="marca_id" class="py-0.7 rounded" style="height:100%; width:100%">
                                    <option value="" selected disabled>Seleccione</option>
                                    @foreach ($marcas as $id => $marca)
                                        <option value="{{ $id }}"
                                            {{ old('marca_id', $expedientee->marca_id) == $id ? 'selected' : '' }}>
                                            {{ $marca }}</option>
                                    @endforeach
                                </select>
                                <x-jet-input-error for="marca_id" />
                            </div>




                            <div class="mb-4">
                                <x-jet-label value="Modelo" />
                                <select name="modello_id" class="py-0.7 rounded" style="height:100%; width:100%">
                                    <option value="" selected disabled>Seleccione</option>
                                    @foreach ($modellos as $id => $modello)
                                        <option value="{{ $id }}"
                                            {{ old('modello_id', $expedientee->modello_id) == $id ? 'selected' : '' }}>
                                            {{ $modello }}</option>
                                    @endforeach
                                </select>
                                <x-jet-input-error for="modello_id" />
                            </div>

                            <div class="mb-4">
                                <x-jet-label value="Chasis:" />
                                <x-jet-input type="text" name="chasis"
                                    value="{{ old('chasis', $expedientee->chasis) }}" placeholder="Chasis"
                                    class="w-full" />
                                <x-jet-input-error for="chasis" />
                            </div>

                            <div class="mb-4">
                                <x-jet-label value="Motor:" />
                                <x-jet-input type="text" name="motor"
                                    value="{{ old('motor', $expedientee->motor) }}" placeholder="Motor"
                                    class="w-full" />
                                <x-jet-input-error for="motor" />
                            </div>

                            <div class="mb-4">
                                <x-jet-label value="Color" />
                                <select name="color_id" class="py-0.7 rounded" style="height:100%; width:100%">
                                    <option value="" selected disabled>Seleccione</option>
                                    @foreach ($colors as $id => $color)
                                        <option value="{{ $id }}"
                                            {{ old('color_id', $expedientee->color_id) == $id ? 'selected' : '' }}>
                                            {{ $color }}</option>
                                    @endforeach
                                </select>
                                <x-jet-input-error for="color_id" />
                            </div>


                            <div class="mb-4">
                                <x-jet-label value="Año" />
                                <select name="anio_id" class="py-0.7 rounded" style="height:100%; width:100%">
                                    <option value="" selected disabled>Seleccione</option>
                                    @foreach ($anios as $id => $anio)
                                        <option value="{{ $id }}"
                                            {{ old('anio_id', $expedientee->anio_id) == $id ? 'selected' : '' }}>
                                            {{ $anio }}</option>
                                    @endforeach
                                </select>
                                <x-jet-input-error for="anio_id" />
                            </div>

                            <div class="mb-4">
                                <x-jet-label value="Categoria" />
                                <select name="categoria_id" class="py-0.7 rounded" style="height:100%; width:100%">
                                    <option value="" selected disabled>Seleccione</option>
                                    @foreach ($categorias as $id => $categoria)
                                        <option value="{{ $id }}"
                                            {{ old('categoria_id', $expedientee->categoria_id) == $id ? 'selected' : '' }}>
                                            {{ $categoria }}</option>
                                    @endforeach
                                </select>
                                <x-jet-input-error for="categoria_id" />
                            </div>

                            <div class="mb-4">
                                <x-jet-label value="Dua:" />
                                <x-jet-input type="text" name="dua"
                                    value="{{ old('dua', $expedientee->dua) }}" placeholder="Dua" class="w-full" />
                                <x-jet-input-error for="dua" />
                            </div>

                            <div class="mb-4">
                                <x-jet-label value="Item:" />
                                <x-jet-input type="text" name="item"
                                    value="{{ old('item', $expedientee->item) }}" placeholder="Item"
                                    class="w-full" />
                                <x-jet-input-error for="item" />
                            </div>

                            <div class="mb-4">
                                <x-jet-label value="Certificado:" />
                                <x-jet-input type="text" name="certificado"
                                    value="{{ old('certificado', $expedientee->certificado) }}"
                                    placeholder="Certificado" class="w-full" />
                                <x-jet-input-error for="certificado" />
                            </div>

                            <div class="mb-4">
                                <x-jet-label value="Archivo Certificado:" />
                                <x-jet-input type="text" name="archivocertificado"
                                    value="{{ old('archivocertificado', $expedientee->archivocertificado) }}"
                                    placeholder="Archivo Certificado" class="w-full" />
                                <x-jet-input-error for="archivocertificado" />
                            </div>

                            <hr>



                            <x-jet-danger-button class="w-full mt-4 mb-3" type="submit">
                                <i class="mx-2 fa-regular fa-floppy-disk"></i> Actualizar Expediente
                            </x-jet-danger-button>





                        </div>
                    </div>
                </div>

            </div>


            <div class="px-3 bg-white">

                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div>

                            <h3 class="mt-4 text-center profile-username">Datos de SUNARP </h3>

                            <div class="mt-4 mb-4 ">
                                <x-jet-label value="Oficina Registral" />
                                <select name="oficinaregistral_id" class="py-0.7 rounded"
                                    style="height:100%; width:100%">
                                    <option value="" selected disabled>Seleccione</option>
                                    @foreach ($oficinaregistrals as $id => $oficinaregistral)
                                        <option value="{{ $id }}"
                                            {{ old('oficinaregistral_id', $expedientee->oficinaregistral_id) == $id ? 'selected' : '' }}>
                                            {{ $oficinaregistral }}</option>
                                    @endforeach

                                </select>
                                <x-jet-input-error for="oficinaregistral_id" />
                            </div>


                            <div class="mb-4">


                                <x-jet-label value="Fecha de Ingreso:" />
                                <x-jet-input type="text" id="datepicker3" name="fechaingreso"
                                    {{-- value="{{ old('fechaingreso', \Carbon\Carbon::parse($expedientee->fechaingreso)->format('d-m-Y')) }}" --}}
                                    value="{{ old('fechaingreso', $expedientee->fechaingreso ?? '') }}"
                                    placeholder="Fecha de Ingreso" class="w-full" />
                                <x-jet-input-error for="fechaingreso" />
                            </div>

                            <div class="mb-4">
                                <x-jet-label value="Titulo:" />
                                <x-jet-input type="text" name="titulo"
                                    value="{{ old('titulo', $expedientee->titulo) }}" placeholder="Título"
                                    class="w-full" />
                                <x-jet-input-error for="titulo" />
                            </div>

                            <div class="mb-4">
                                <x-jet-label value="Código de Verificación:" />
                                <x-jet-input type="text" name="codigodeverificacion"
                                    value="{{ old('codigodeverificacion', $expedientee->codigodeverificacion) }}"
                                    placeholder="Código de Verificación" class="w-full" />
                                <x-jet-input-error for="codigodeverificacion" />
                            </div>

                            <div class="mb-4">
                                <x-jet-label value="Recibo:" />
                                <x-jet-input type="text" name="recibo"
                                    value="{{ old('recibo', $expedientee->recibo) }}" placeholder="Recibo"
                                    class="w-full" />
                                <x-jet-input-error for="recibo" />
                            </div>

                            <div class="mb-4">
                                <x-jet-label value="Importe:" />
                                <x-jet-input type="text" name="importe"
                                    value="{{ old('importe', $expedientee->importe) }}" placeholder="Importe"
                                    class="w-full" />
                                <x-jet-input-error for="importe" />
                            </div>


                            <div class="mt-4 mb-4 ">
                                <x-jet-label value="Status Sunarp" />
                                <select name="statussunarp_id" class="py-0.7 rounded"
                                    style="height:100%; width:100%">
                                    <option value="" selected disabled>Seleccione</option>
                                    @foreach ($statussunarps as $id => $statussunarp)
                                        <option value="{{ $id }}"
                                            {{ old('statussunarp_id', $expedientee->statussunarp_id) == $id ? 'selected' : '' }}>
                                            {{ $statussunarp }}</option>
                                    @endforeach
                                </select>
                                <x-jet-input-error for="statussunarp_id" />
                            </div>

                            <hr>

                            <x-jet-danger-button class="w-full mt-4 mb-3" type="submit">
                                <i class="mx-2 fa-regular fa-floppy-disk"></i> Actualizar Expediente
                            </x-jet-danger-button>





                        </div>
                    </div>
                </div>

            </div>

            <div class="px-3 bg-white">

                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div>

                            <h3 class="mt-4 text-center profile-username">Datos de Entrega</h3>


                            <div class="mt-4 mb-4">
                                <x-jet-label value="Tarjeta de Propiedad:" />
                                {{-- <x-jet-input type="text" name="name" value="{{ old('name') }}"
                                    placeholder="tu  nombre" class="w-full" /> --}}

                                @if ($expedientee->tarjetadepropiedad)
                                    <a href="{{ Storage::disk('s3')->url($expedientee->tarjetadepropiedad) }} "
                                        target="_blank"><img src="/images/logopdf.jpg"
                                            alt="{{ $expedientee->name }}"></a>
                                @endif

                                <x-jet-input type="file" name="tarjetadepropiedad"
                                    placeholder="Tarjeta de Propiedad" />
                                <x-jet-input-error for="tarjetadepropiedad" />

                            </div>




                            <div class="mt-4 mb-4">
                                <x-jet-label value="Cargo Envío:" />
                                {{-- <x-jet-input type="text" name="name" value="{{ old('name') }}"
                                    placeholder="tu  nombre" class="w-full" /> --}}

                                @if ($expedientee->cargoenvio)
                                    <a href="{{ Storage::disk('s3')->url($expedientee->cargoenvio) }} "
                                        target="_blank"><img src="/images/logopdf.jpg"
                                            alt="{{ $expedientee->name }}"></a>
                                @endif


                                <x-jet-input type="file" name="cargoenvio" placeholder="Cargo Envío" />
                                <x-jet-input-error for="cargoenvio" />

                            </div>



                            <div class="mb-4">
                                <x-jet-label value="Numero de Placa:" />
                                <x-jet-input type="text" name="numerodeplaca"
                                    value="{{ old('numerodeplaca', $expedientee->numerodeplaca) }}"
                                    placeholder="Numero de Placa" class="w-full" />
                                <x-jet-input-error for="numerodeplaca" />
                            </div>


                            <div class="mb-4">
                                <x-jet-label value="Fecha de Envío:" />
                                <x-jet-input type="text" id="datepicker4" name="fechadeenvio"
                                    value="{{ old('fechadeenvio', $expedientee->fechadeenvio ?? '') }}"
                                    placeholder="Fecha de Envío" class="w-full" />
                                <x-jet-input-error for="fechadeenvio" />

                            </div>

                            <div class="mb-4">
                                <x-jet-label value="Guia de Remision:" />
                                <x-jet-input type="text" name="guiaderemision"
                                    value="{{ old('guiaderemision', $expedientee->guiaderemision) }}"
                                    placeholder="Guia de Remision" class="w-full" />
                                <x-jet-input-error for="guiaderemision" />
                            </div>






                            <div class="mt-4 mb-4 ">
                                <x-jet-label value="Status Final" />
                                <select name="statusfinal_id" class="py-0.7 rounded" style="height:100%; width:100%">
                                    <option value="" selected disabled>Seleccione</option>
                                    @foreach ($statusfinals as $id => $statusfinal)
                                        <option value="{{ $id }}"
                                            {{ old('statusfinal_id', $expedientee->statusfinal_id) == $id ? 'selected' : '' }}>
                                            {{ $statusfinal }}</option>
                                    @endforeach
                                </select>
                                <x-jet-input-error for="statusfinal_id" />
                            </div>


                            <hr>



                            <x-jet-danger-button class="w-full mt-4 mb-3" type="submit">
                                <i class="mx-2 fa-regular fa-floppy-disk"></i> Actualizar Expediente
                            </x-jet-danger-button>





                        </div>
                    </div>
                </div>

            </div>

            {{--  <div class="px-3 py-4 bg-white md:col-span-2">
                        <p class="text-lg font-bold underline underline-offset-2">Roles</p>
                        <div class="mb-4">

                            @include('admin.roles.checkboxes')
                        </div>

                        <p class="text-lg font-bold underline underline-offset-2">Permisos</p>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4">

                            @include('admin.permissions.checkboxes', ['model' => $user])
                        </div>
                    </div> --}}

        </div>

        <div class="grid grid-cols-1 px-4 mx-auto mt-4 bg-white sm:px-6 lg:px-8 gap-x-6 gap-y-8">
            <div class="mb-4">
                <x-jet-label value="Observaciones del expediente:" />


                <textarea name="observacion" class="w-full form-control" rows="5">{{ old('observacion', $expedientee->observacion) }}</textarea>

            </div>
        </div>



    </form>



    <!-- Moment.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

    <!-- Pikaday -->
    <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">


    @push('styles')
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
    @endpush

    @push('scripts')
        <!-- Moment.js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

        <!-- Pikaday -->
        <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>





        <script>
            /*  new Pikaday({
                                                                                        field: document.getElementById('datepicker'),
                                                                                        format: 'D MMM YYYY',

                                                                                    }); */

            /* new Pikaday({
                field: document.getElementById('datepicker2'),
                format: 'D MMM YYYY',

            }); */
        </script>



        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var picker = new Pikaday({
                    field: document.getElementById('datepicker'),
                    format: 'DD-MM-YYYY',
                    showYearDropdown: true,
                    yearRange: [1900, moment().year()]
                });


            });
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var picker2 = new Pikaday({
                    field: document.getElementById('datepicker2'),
                    format: 'DD-MM-YYYY',
                    showYearDropdown: true,
                    yearRange: [1900, moment().year()]
                });


            });
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var picker3 = new Pikaday({
                    field: document.getElementById('datepicker3'),
                    format: 'DD-MM-YYYY',
                    showYearDropdown: true,
                    yearRange: [1900, moment().year()]
                });


            });
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var picker4 = new Pikaday({
                    field: document.getElementById('datepicker4'),
                    format: 'DD-MM-YYYY',
                    showYearDropdown: true,
                    yearRange: [1900, moment().year()]
                });


            });
        </script>
    @endpush






</x-app-layout>

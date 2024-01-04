<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Menu General') }}
        </h2>
    </x-slot>




    <section class="">

        <div class="py-12">
           {{--  <div class="mx-auto max-w-7xl sm:px-6 lg:px-8"> --}}
                {{-- <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg"> --}}

                        <div class="grid grid-cols-1 px-4 mx-auto mt-4 max-w-7xl sm:px-6 lg:px-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-x-6 gap-y-8">


                                {{-- <article>
                                    <figure>
                                        <img class="object-cover w-full rounded-xl h-36" src="{{asset('img/configuraciones.jpg')}}" alt="Configuraciones">
                                    </figure>
                                    <header class="mt-2">
                                        <h1 class="text-xl text-center text-gray-700">Configuraciones</h1>
                                    </header>

                                </article> --}}
                                @can('User View')
                                <article>
                                    <figure>
                                        <img class="object-cover w-full rounded-xl h-36" src="{{asset('img/usuarios.jpg')}}" alt="">
                                    </figure>
                                    <header class="mt-2">
                                        <h1 class="text-xl text-center text-gray-700"><a href="{{route('admin.user.index')}}">Usuarios</a></h1>
                                    </header>

                                </article>
                                @endcan

                                @can('Permission View')
                                <article>
                                    <figure>
                                        <img class="object-cover w-full rounded-xl h-36" src="{{asset('img/permisos.jpg')}}" alt="">
                                    </figure>
                                    <header class="mt-2">
                                        <h1 class="text-xl text-center text-gray-700"><a href="{{route('permission.list')}}">Permisos</a></h1>
                                    </header>

                                </article>
                                @endcan

                                @can('Role View')
                                <article>
                                    <figure>
                                        <img class="object-cover w-full rounded-xl h-36" src="{{asset('img/roles.jpg')}}" alt="">
                                    </figure>
                                    <header class="mt-2">
                                        <h1 class="text-xl text-center text-gray-700"><a href="{{route('admin.role.index')}}">Roles</a></h1>
                                    </header>

                                </article>
                                @endcan



                                {{-- <article>
                                    <figure>
                                        <img class="object-cover w-full rounded-xl h-36" src="{{asset('img/brands.jpg')}}" alt="">
                                    </figure>
                                    <header class="mt-2">
                                        <h1 class="text-xl text-center text-gray-700"><a href="{{route('brand.list')}}">Marcas</a></h1>
                                    </header>

                                </article> --}}

                                @can('Representada View')
                                <article>
                                    <figure>
                                        <img class="object-cover w-full rounded-xl h-36" src="{{asset('img/categories.jpg')}}" alt="">
                                    </figure>
                                    <header class="mt-2">
                                        <h1 class="text-xl text-center text-gray-700"><a href="{{route('representada.list')}}">Cuentas</a></h1>

                                    </header>

                                </article>
                                @endcan

                                @can('Zona View')
                                <article>
                                    <figure>
                                        <img class="object-cover w-full rounded-xl h-36" src="{{asset('img/zona.jpg')}}" alt="">
                                    </figure>
                                    <header class="mt-2">
                                        <h1 class="text-xl text-center text-gray-700"><a href="{{route('zona.list')}}">Zonas</a></h1>
                                    </header>

                                </article>
                                @endcan


                                @can('Tienda View')
                                <article>
                                    <figure>
                                        <img class="object-cover w-full rounded-xl h-36" src="{{asset('img/tienda.jpg')}}" alt="">
                                    </figure>
                                    <header class="mt-2">
                                        <h1 class="text-xl text-center text-gray-700"><a href="{{route('tienda.list')}}">Tiendas</a></h1>

                                    </header>

                                </article>
                                @endcan

                                @can('Cliente View')
                                <article>
                                    <figure>
                                        <img class="object-cover w-full rounded-xl h-36" src="{{asset('img/cliente.jpg')}}" alt="">
                                    </figure>
                                    <header class="mt-2">
                                        <h1 class="text-xl text-center text-gray-700"><a href="{{route('cliente.list')}}">Clientes</a></h1>
                                    </header>

                                </article>
                                @endcan

                                @can('Cliente Viewd')
                                <article>
                                    <figure>
                                        <img class="object-cover w-full rounded-xl h-36" src="{{asset('img/clientescuentas.jpg')}}" alt="">
                                    </figure>
                                    <header class="mt-2">
                                        <h1 class="text-xl text-center text-gray-700"><a href="{{route('cliente.list2')}}">Clientes - Cuentas</a></h1>
                                    </header>

                                </article>
                                @endcan


 {{--                                <article>
                                    <figure>
                                        <img class="object-cover w-full rounded-xl h-36" src="{{asset('img/inventario2.jpg')}}" alt="">
                                    </figure>
                                    <header class="mt-2">
                                        <h1 class="text-xl text-center text-gray-700"><a href="{{route('inventory.list2')}}">Inventarios</a></h1>
                                    </header>

                                </article> --}}


                                @can('Expediente View')
                                <article>
                                    <figure>
                                        <img class="object-cover w-full rounded-xl h-36" src="{{asset('img/expedientes.jpg')}}" alt="">
                                    </figure>
                                    <header class="mt-2">
                                        <h1 class="text-xl text-center text-gray-700"><a href="{{route('expediente.list')}}">Expedientes</a></h1>
                                    </header>

                                </article>
                                @endcan



                                @can('Consulta View')
                                <article>
                                    <figure>
                                        <img class="object-cover w-full rounded-xl h-36" src="{{asset('img/consultas.jpg')}}" alt="">
                                    </figure>
                                    <header class="mt-2">
                                        <h1 class="text-xl text-center text-gray-700"><a href="{{route('consulta.list')}}">Consultas</a></h1>
                                    </header>

                                </article>
                                @endcan


                                {{-- factura boleta --}}
                                {{-- @can('Tipodedocumento View')
                                <article>
                                    <figure>
                                        <img class="object-cover w-full rounded-xl h-36" src="{{asset('img/ecommerce.jpg')}}" alt="">
                                    </figure>
                                    <header class="mt-2">
                                        <h1 class="text-xl text-center text-gray-700">Tipo Documentos</h1>
                                    </header>

                                </article>
                                @endcan --}}


                                @can('Marca View')
                                <article>
                                    <figure>
                                        <img class="object-cover w-full rounded-xl h-36" src="{{asset('img/marcas.jpg')}}" alt="">
                                    </figure>
                                    <header class="mt-2">
                                        <h1 class="text-xl text-center text-gray-700"><a href="{{route('marca.list')}}">Marcas</a></h1>
                                    </header>

                                </article>
                                @endcan

                                @can('Modello View')
                                <article>
                                    <figure>
                                        <img class="object-cover w-full rounded-xl h-36" src="{{asset('img/modelos.jpg')}}" alt="">
                                    </figure>
                                    <header class="mt-2">
                                        <h1 class="text-xl text-center text-gray-700"><a href="{{route('modello.list')}}">Modelos</a></h1>
                                    </header>

                                </article>
                                @endcan

                                {{-- contado, credito --}}
                                {{-- @can('Tipodeventa View')
                                <article>
                                    <figure>
                                        <img class="object-cover w-full rounded-xl h-36" src="{{asset('img/ecommerce.jpg')}}" alt="">
                                    </figure>
                                    <header class="mt-2">
                                        <h1 class="text-xl text-center text-gray-700">Tipo Ventas</h1>
                                    </header>

                                </article>
                                @endcan --}}

                                @can('Statusfinal View')
                                <article>
                                    <figure>
                                        <img class="object-cover w-full rounded-xl h-36" src="{{asset('img/statusfinal.jpg')}}" alt="">
                                    </figure>
                                    <header class="mt-2">
                                        <h1 class="text-xl text-center text-gray-700"><a href="{{route('statusfinal.list')}}">Status Final</a></h1>
                                    </header>

                                </article>
                                @endcan
                                @can('Oficinaregistral View')
                                <article>
                                    <figure>
                                        <img class="object-cover w-full rounded-xl h-36" src="{{asset('img/oficinaregistral.jpg')}}" alt="">
                                    </figure>
                                    <header class="mt-2">
                                        <h1 class="text-xl text-center text-gray-700"><a href="{{route('oficinaregistral.list')}}">Oficina registral</a></h1>
                                    </header>

                                </article>
                                @endcan
                                @can('Statussunarp View')
                                <article>
                                    <figure>
                                        <img class="object-cover w-full rounded-xl h-36" src="{{asset('img/statussunarp.jpg')}}" alt="">
                                    </figure>
                                    <header class="mt-2">

                                        <h1 class="text-xl text-center text-gray-700"><a href="{{route('statussunarp.list')}}">Status Sunarp</a></h1>
                                    </header>

                                </article>
                                @endcan
                                @can('Categoria View')
                                <article>
                                    <figure>
                                        <img class="object-cover w-full rounded-xl h-36" src="{{asset('img/categorias.jpg')}}" alt="">
                                    </figure>
                                    <header class="mt-2">
                                        <h1 class="text-xl text-center text-gray-700"><a href="{{route('categoria.list')}}">Categorias</a></h1>
                                    </header>

                                </article>
                                @endcan

                                @can('Anio View')
                                <article>
                                    <figure>
                                        <img class="object-cover w-full rounded-xl h-36" src="{{asset('img/anio.jpg')}}" alt="">
                                    </figure>
                                    <header class="mt-2">
                                        <h1 class="text-xl text-center text-gray-700"><a href="{{route('anio.list')}}">Años</a></h1>
                                    </header>

                                </article>
                                @endcan

                                @can('Color View')
                                <article>
                                    <figure>
                                        <img class="object-cover w-full rounded-xl h-36" src="{{asset('img/color.jpg')}}" alt="">
                                    </figure>
                                    <header class="mt-2">
                                        <h1 class="text-xl text-center text-gray-700"><a href="{{route('color.list')}}">Colores</a></h1>
                                    </header>

                                </article>
                                @endcan


                        </div>
                {{-- </div> --}}
            {{-- </div> --}}
        </div>




    </section>



    <section>
        <div class="mt-4 bg-white shadow">
            hola
        </div>
    </section>

</x-app-layout>

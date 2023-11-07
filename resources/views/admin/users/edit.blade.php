<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Edit Users') }}
        </h2>
    </x-slot>

        <div class="grid grid-cols-1 px-4 mx-auto mt-4 sm:px-6 lg:px-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-x-6 gap-y-8">

        <form method="POST" action="{{ route('admin.user.update', $user) }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="px-3 bg-white">

                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div>

                            <h3 class="text-center profile-username">Datos del Usuario</h3>


                            {{--  @include('partials.error-messages') --}}




                            <div class="mb-4">
                                <x-jet-label value="Nombre:" />
                                <x-jet-input type="text" name="name" value="{{ old('name', $user->name) }}"
                                    placeholder="tu  nombre" class="w-full" />
                                <x-jet-input-error for="name" />
                            </div>

                            <div class="mb-4">
                                <x-jet-label value="Email:" />
                                <x-jet-input type="email" name="email" value="{{ old('email', $user->email) }}"
                                    placeholder="ingrese tu Email" class="w-full" />
                                <x-jet-input-error for="email" />
                            </div>


                            <div class="mb-4">
                                <x-jet-label value="Password:" />
                                <x-jet-input type="password" placeholder="tu  passowrd" class="w-full "
                                    name="password" />
                                <x-jet-input-error for="password" />
                            </div>

                            {{-- <div class="mb-4">
                                                <x-jet-label value="Passwordd:" />
                                                <x-jet-input type="passwordd" class="w-full" name="passwordd" />
                                                <x-jet-input-error for="passwordd"/>
                                            </div> --}}


                            <div class="mb-5">
                                <x-jet-label value="Password:" />
                                <x-jet-input id="password_confirmation" name="password_confirmation" type="password"
                                    placeholder="Repite tu  passowrd" class="w-full" />
                            </div>
                            <hr>






                            <x-jet-danger-button class="w-full mt-4 mb-3" type="submit">
                                <i class="mx-2 fa-regular fa-floppy-disk"></i> Actualizar datos del Usuario
                            </x-jet-danger-button>





                        </div>
                    </div>
                </div>

            </div>
        </form>

            <div class="px-3 py-4 bg-white md:col-span-2">
                <p class="pb-4 text-lg font-bold underline underline-offset-2">Roles</p>
                <div class="mb-4">

                     @role('Admin')
                    <form method="POST" action="{{ route('admin.user.roles.update', $user) }}">
                       {{ csrf_field() }} {{ method_field('PUT')}}

                        @include('admin.roles.checkboxes')

                        {{-- <button class="btn btn-primary btn-block">Actualizar Roles</button> --}}
                        <x-jet-danger-button class="w-64 mt-4 mb-3" type="submit">
                            <i class="mx-2 fa-regular fa-floppy-disk"></i> Actualizar Roles
                        </x-jet-danger-button>
                    </form>
                    @else
                        <ul>
                            @forelse($user->roles as $role)
                            <li class="list-group-item">{{ $role->name }}</li>
                            @empty
                            <li class="list-group-item">no tiene roles</li>
                            @endforelse


                        </ul>
                    @endrole

                   {{--  @include('admin.roles.checkboxes') --}}
                </div>

                <p class="pb-4 text-lg font-bold underline underline-offset-2">Permisos</p>
                @role('Admin')


                        {{-- @include('admin.permissions.checkboxes', ['model' => $user]) --}}

                        <form method="POST" action="{{ route('admin.users.permissions.update', $user) }}">
                        {{ csrf_field() }} {{ method_field('PUT')}}
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
                            @include('admin.permissions.checkboxes', ['model' =>$user])
                        </div>
                            <x-jet-danger-button class="w-64 mt-4 mb-3" type="submit">
                                <i class="mx-2 fa-regular fa-floppy-disk"></i> Actualizar Permisos
                            </x-jet-danger-button>
                        </form>

                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
                            @forelse($user->permissions as $permission)
                            <div >{{ $permission->name }}</div>
                            @empty
                            <div >No tiene permisos</div>
                            @endforelse


                    </div>
                @endrole


                </div>
            </div>

        </div>

</x-app-layout>

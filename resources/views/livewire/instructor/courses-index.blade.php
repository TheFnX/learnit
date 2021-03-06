<div class="container py-8">
    <x-table-responsive>

        <div class="px-6 py-4 flex text-center">
            {{-- <input wire:keydown="clean_page" wire:model="search" class="form-input w-full shadow-sm" placeholder="Ingrese el nombre de un curso..."> --}}
            <input wire:keydown="clean_page" wire:model="search" class="flex-1 shadow-sm px-4 border-2 border-green-300 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded-md" placeholder="Ingrese el nombre de un curso...">
            <a class="btn btn-success ml-2" href="{{route('instructor.courses.create')}}">Nuevo Curso</a>

        </div>
        @if ($courses->count())
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Nombre
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Interesados
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Calificación
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Estado
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Editar</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">

                    @foreach ($courses as $course)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        @isset($course->image)
                                            <img class="w-full h-full rounded-full object-cover object-center"  src="/{{$course->image->url}}">
                                        @else
                                            <img class="w-full h-full rounded-full object-cover object-center"  src="https://cdn.pixabay.com/photo/2018/05/19/00/53/online-3412473_960_720.jpg" alt="">
                                        @endisset
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{$course->title}}
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            {{$course->category->name}}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{$course->students->count()}}</div>
                                <div class="text-sm text-gray-500">Personas interesadas</div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900 flex items-center">
                                    <ul class="flex text-sm">
                                        <li class="mr-1"><i class="fas fa-star text-{{$course->rating >= 1 ? 'yellow' : 'gray'}}-400"></i></li>
                                        <li class="mr-1"><i class="fas fa-star text-{{$course->rating >= 2 ? 'yellow' : 'gray'}}-400"></i></li>
                                        <li class="mr-1"><i class="fas fa-star text-{{$course->rating >= 3 ? 'yellow' : 'gray'}}-400"></i></li>
                                        <li class="mr-1"><i class="fas fa-star text-{{$course->rating >= 4 ? 'yellow' : 'gray'}}-400"></i></li>
                                        <li class="mr-1"><i class="fas fa-star text-{{$course->rating == 5 ? 'yellow' : 'gray'}}-400"></i></li>
                                    </ul>
                                </div>
                                <div class="text-sm text-gray-500">Valoración del evento</div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                @switch($course->status)
                                    @case(1)
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            Borrador
                                        </span>
                                        @break
                                    @case(2)
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                            Revisión
                                        </span>
                                        @break
                                    @case(3)
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Publicado
                                        </span>
                                        @break
                                    @default

                                @endswitch


                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-large">
                                <a href="{{route('instructor.courses.edit', $course)}}" class="text-indigo-600 hover:text-green-600"><strong>Editar</strong></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="px-6 py-4">
                {{$courses->links()}}
            </div>
        @else
            <div class="px-6 py-4">
                No hay ninguna coincidencia
            </div>
        @endif

    </x-table-responsive>
</div>

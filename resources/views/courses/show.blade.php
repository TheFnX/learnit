<x-app-layout>
    <section class="container bg-gray-300 py-12 mb-12">
        <div class="container grid grid-cols-1 lg:grid-cols-2 gap-6">
            <figure>
                <img class="h-80 w-full object-cover" src="{{Storage::url($course->image->url)}}" alt="">
            </figure>

            <div class="text-gray-800">
                <h1 class="text-4xl">{{$course->title}}</h1>
                <h2 class="text-xl mb-3">{{$course->subtitle}}</h2>
                @if ($course->price == 0)
                    <p class="mb-2"><i class="fas fa-money-bill-wave"></i> Precio: Gratuito</p>            
                @else
                    <p class="my-2 text-gray-500 font-bold"> Precio: {{$course->price}} Bs.</p>  
                @endif
                <p class="mb-2"><i class="far fa-calendar-alt"></i> Fecha: {{ \Carbon\Carbon::parse($course->date)->format('d/m/Y')}}</p> 
                <p class="mb-2"><i class="far fa-clock"></i> Hora: {{$course->time}}</p> 
                <p class="mb-2"><i class="fas fa-chart-line"></i> Nivel: {{$course->level->name}}</p>
                <p class="mb-2"><i class="far fa-folder-open"></i> Categoria: {{$course->category->name}}</p>
                <p class="mb-2"><i class="fas fa-users"></i> Interesados: {{$course->students_count}}</p>
                <p class="mb-2"><i class="far fa-star"></i> Calificación: {{$course->rating}}</p>
            </div>
        </div>
    </section>
    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="order-2 lg:col-span-2 lg:order-1">
            <section class="card mb-8">
                <div class="card-body">
                    <h1 class="font-bold text-2xl mb-2">Dirigido a:</h1>

                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2">
                        @foreach ($course->goals as $goal)
                            <li class="text-gray-700 text-base"><i class="fas fa-user-tie text-gray-600 mr-2"></i>{{$goal->name}}</li>
                        @endforeach                        
                    </ul>
                </div>
            </section>
            <section class="mb-8">
                <div class="card mb-8">
                    <div class="card-body">
                        <h1 class="font-bold text-3xl mb-2 text-gray-800">Descripción</h1>
                        <div class="text-gray-700 text-base">
                            {!!$course->description!!}
                        </div>
                    </div>
                </div>
            </section>  

            <section class="mb-8">
                {{-- <h1 class="font-bold text-3xl mb-2 text-gray-800">Temario</h1> --}}
                @foreach ($course->sections as $section)
                    <article class="mb-4 shadow"
                        @if ($loop->first)
                            x-data="{ open: true }"
                            @else
                            x-data="{ open: false }"                            
                        @endif>
                        <header class="border border-gray-200 px-4 py-2 cursor-pointer bg-gray-200" x-on:click="open = !open">
                            <h1 class="font-bold text-lg text-gray-600">{{$section->name}}</h1>
                        </header>
                        <div class="bg-white py-2 px-4" x-show="open">
                            <ul class="grid grid-cols-1 gap-2">
                                @foreach ($section->lessons as $lesson)
                                    <li class="text-gray-700 text-base"><i class="fas fa-bookmark mr-2 text-gray-600"></i>{{$lesson->name}}</li>                                    
                                @endforeach
                            </ul>
                        </div>
                    </article>
                @endforeach
            </section>

            <section class="mb-8">
                <div class="card mb-8">
                    <div class="card-body">                    
                        <h1 class="font-bold text-3xl mb-2 text-gray-800">Requisitos</h1>
                        <ul class="list-disc list-inside">
                            @foreach ($course->requirements as $requirement)                            
                                <li class="text-gray-700 text-base">{{$requirement->name}}</li>                                                      
                            @endforeach
                        </ul>      
                    </div>
                </div>            
            </section>                      

            @livewire('courses-reviews', ['course' => $course])

        </div>

        <div class="order-1 lg:order-2">
            <section class="card mb-4">                
                <div class="card-body">
                    <div class="flex items-center">
                        <img class="h-12 w-12 object-cover rounded-full shadow-lg" src="{{$course->teacher->profile_photo_url}}" alt="{{$course->teacher->name}}">
                        <div class="ml-4">
                            <h1 class="font-bold text-gray-500 text-lg">{{$course->teacher->name}}</h1>
                            <a class="text-blue-400 text-sm font-bold" href="">{{'@' . Str::slug($course->teacher->name, '')}}</a> 
                        </div>
                    </div>                   

                    @can('enrolled', $course)      
                        
                        <a class="btn btn-success btn-block mt-4" href="{{route('courses.status', $course)}}">Siguiendo curso</a>
                        
                    @else                        
                   
                        <form action="{{route('courses.enrolled', $course)}}" method="POST">
                            @csrf
                            <button class="btn btn-danger btn-block mt-4">Estoy interesado</button>
                        </form>
                    @endcan
                </div>
            </section>
            <aside class="hidden lg:block">
                @foreach ($similares as $similar)
                    <article class="flex mb-6">
                        <img class="h-32 w-40 object-cover" src="{{Storage::url($similar->image->url)}}" alt="">
                        <div class="ml-3">
                            <h1>
                                <a class="font-bold text-gray-500 mb-3" href="{{route('courses.show', $similar)}}">{{Str::limit($similar->title, 40)}}</a>
                            </h1>
                            <div class="flex items-center">
                                <img class="h-8 w-8 object-cover rounded-full shadow-lg" src="{{$similar->teacher->profile_photo_url}}" alt="">
                                <p class="text-gray-700 text-sm ml-2">{{$similar->teacher->name}}</p>
                            </div>

                            <p class="text-sm"><i class="fas fa-star mr-2 mt-2 text-yellow-400"></i>{{$similar->rating}}</p>
                        </div>
                    </article>
                @endforeach
            </aside>
        </div>
    </div>
    
</x-app-layout>

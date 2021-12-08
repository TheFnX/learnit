<section class="px-4 py-4 bg-gray-200 lg:px-20 lg:py-8">
    <div class="flex flex-wrap lg:space-x-12">

        <div class="lg:w-3/5">
            <h1 class="mb-4 text-2xl font-medium text-center text-gray-900 lg:text-3xl">{{$course->title}}</h1>
            {{-- <h1 class="font-bold text-2xl mb-2 mt-2 text-center items-center">{{$course->title}}</h1>   --}}
                <figure>
                    <img class="h-full w-full object-cover" src="{{Storage::url($course->image->url)}}" alt="">
                </figure>         
        </div>

        <div class="lg:w-1/3 lg:mt-4">
            <form action="">
                <div class="lg:grid lg:gap-1 lg:grid-cols-1">
                    <div class="card">
                        <div class="card-body">                
                            <div class="flex items-center">
                                <figure>
                                    <img class="h-12 w-12 object-cover rounded-full mr-4" src="{{$course->teacher->profile_photo_url}}" alt="">
                                </figure>
                                <div>
                                    <p>{{$course->teacher->name}}</p>                        
                                    @if ($course->teacher->phone)
                                        <div class="text-gray-600">
                                            <a href="https://api.whatsapp.com/send?phone=[+591][{{$course->teacher->phone}}]&text=Estoy interesado!" class="text-green-500"><i class="fab fa-whatsapp"></i></a>                            
                                        </div>
                                    @endif   
                                </div>
                            
        
                                    {{-- <a class="text-blue-500 text-sm" href="">{{'@' . Str::slug($course->teacher->name, '')}}</a> --}}
                                </div>
                            </div>
                            <hr class="mb-2 border-green-500">
        
                            {{-- <p class="text-gray-600 text-sm mt-2">{{$this->advance . '%'}} Completado</p> --}}
        
                            {{-- <div class="relative pt-1">
                                <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-gray-200">
                                <div style="width:{{$this->advance . '%'}}" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500 transition-all duration-500"></div>
                                </div>
                            </div> --}}
        
                            <ul>
                                @foreach ($course->sections as $section)
                                    <li class="text-gray-600 mb-4 ml-4 mr-4">
                                        <a class="font-bold text-base inline-block mb-2">{{$section->name}}</a>
                                        <ul>
                                            @foreach ($section->lessons as $lesson)
                                                <li class="flex">
                                                    <div>
                                                        @if ($lesson->completed)
                                                            @if ($current->id == $lesson->id)
                                                                <span class="inline-block w-4 h-4 border-2 border-yellow-300 rounded-full mr-2 mt-1"></span>
                                                            @else 
                                                                <span class="inline-block w-4 h-4 bg-yellow-300 rounded-full mr-2 mt-1"></span>
                                                            @endif
        
                                                        @else  
                                                            @if ($current->id == $lesson->id)
                                                            <span class="inline-block w-4 h-4 bg-green-500 rounded-full mr-2 mt-1"></span>     
        
                                                            @else
                                                            <span class="inline-block w-4 h-4 border-2 border-green-500 rounded-full mr-2 mt-1"></span> 
        
                                                            @endif
                                                        @endif
                                                    </div>
                                                    <a class="cursor-pointer" wire:click="changeLesson({{$lesson}})">{{$lesson->name}}</a>                                           
                                                </li>                              
                                            @endforeach
                                        </ul>
                                        
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="card-body">
                            @if ($current->resource)                
                                <div class="flex items-center text-red-600 cursor-pointer" wire:click="download">
                                <i class="fas fa-download text-lg"></i>
                                <p class="text-sm ml-2">Descargar recursos</p>                
                            @endif
                        </div>
                    </div>   
                </div>  
            </form>
            {{-- <div class="mt-4 rounded-lg">
                <h3>Ads</h3>
                <img src="https://images.unsplash.com/file-1626897789502-538d933b419fimage" alt="property"
                    class="w-full">
            </div> --}}
        </div>
    </div>
</section>

{{-- <div class="container mt-8">
    <section class="card mb-8 ml-8 mr-8">
        
            <h1 class="font-bold text-2xl mb-2 mt-2 text-center items-center">{{$course->title}}</h1>           
        
    </section>
    
    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2">
            <div class="embed-responsive">
                {!!$current->iframe!!}
            </div>
            <figure>
                <img class="h-full w-full object-cover" src="{{Storage::url($course->image->url)}}" alt="">
            </figure>

            <h1 class="text-3xl text-gray-600 font-bold mt-4">
            {!!$current->name!!}
            </h1>

            @if ($current->description)
                <div class="text-gray-600">
                    {{$current->description->name}}
                </div>
            @endif
            <div class="flex justify-between mt-4 mb-8 ">
                Marcar como culminado
                <div class="flex items-center cursor-pointer" wire:click="completed">
                    @if ($current->completed)
                        <i class="fas fa-toggle-on text-2xl text-blue-600"></i>
                    @else
                        <i class="fas fa-toggle-off text-2xl text-gray-600"></i>
                    @endif
                    <p class="text-sm ml-2">Marcar esta unidad como culminada</p>
                </div>
                Descargar archivos
                @if ($current->resource)
                    <div class="flex items-center text-gray-600 cursor-pointer" wire:click="download">
                        <i class="fas fa-download text-lg"></i>
                        <p class="text-sm ml-2">Descargar recursos</p>
                    </div>
                @endif
            </div>

            <div class="card mt-2">
                <div class="card-body flex text-gray-500 font-bold">
                    @if ($this->previous)
                        <a wire:click="changeLesson({{$this->previous}})" class="cursor-pointer">Tema anterior</a>                        
                    @endif
                    @if ($this->next)
                        <a wire:click="changeLesson({{$this->next}})" class="ml-auto cursor-pointer">Siguiente tema</a>                        
                    @endif

                </div>
            </div>

            <p>Indice: {{$this->index}}</p>
            <p>Previous: @if ($this->previous)
                {{$this->previous->id}}
            @endif</p>
            <p>Next: @if ($this->next)
                {{$this->next->id}}
            @endif</p>

        </div>
        <section>
            <div class="card">
                <div class="card-body">                
                    <div class="flex items-center">
                        <figure>
                            <img class="h-12 w-12 object-cover rounded-full mr-4" src="{{$course->teacher->profile_photo_url}}" alt="">
                        </figure>
                        <div>
                            <p>{{$course->teacher->name}}</p>                        
                            @if ($course->teacher->phone)
                                <div class="text-gray-600">
                                    <a href="https://api.whatsapp.com/send?phone=[+591][{{$course->teacher->phone}}]&text=Estoy interesado!" class="text-green-500"><i class="fab fa-whatsapp"></i></a>                            
                                </div>
                            @endif   
                        </div>
                    

                            <a class="text-blue-500 text-sm" href="">{{'@' . Str::slug($course->teacher->name, '')}}</a>
                        </div>
                    </div>
                    <hr class="mb-2 border-green-500">

                    <p class="text-gray-600 text-sm mt-2">{{$this->advance . '%'}} Completado</p>

                    <div class="relative pt-1">
                        <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-gray-200">
                        <div style="width:{{$this->advance . '%'}}" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500 transition-all duration-500"></div>
                        </div>
                    </div>

                    <ul>
                        @foreach ($course->sections as $section)
                            <li class="text-gray-600 mb-4 ml-4 mr-4">
                                <a class="font-bold text-base inline-block mb-2">{{$section->name}}</a>
                                <ul>
                                    @foreach ($section->lessons as $lesson)
                                        <li class="flex">
                                            <div>
                                                @if ($lesson->completed)
                                                    @if ($current->id == $lesson->id)
                                                        <span class="inline-block w-4 h-4 border-2 border-yellow-300 rounded-full mr-2 mt-1"></span>
                                                    @else 
                                                        <span class="inline-block w-4 h-4 bg-yellow-300 rounded-full mr-2 mt-1"></span>
                                                    @endif

                                                @else  
                                                    @if ($current->id == $lesson->id)
                                                    <span class="inline-block w-4 h-4 bg-green-500 rounded-full mr-2 mt-1"></span>     

                                                    @else
                                                    <span class="inline-block w-4 h-4 border-2 border-green-500 rounded-full mr-2 mt-1"></span> 

                                                    @endif
                                                @endif
                                            </div>
                                            <a class="cursor-pointer" wire:click="changeLesson({{$lesson}})">{{$lesson->name}}</a>                                           
                                        </li>                              
                                    @endforeach
                                </ul>
                                
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="card-body">
                    @if ($current->resource)                
                        <div class="flex items-center text-red-600 cursor-pointer" wire:click="download">
                        <i class="fas fa-download text-lg"></i>
                        <p class="text-sm ml-2">Descargar recursos</p>                
                    @endif
                </div>
            </div>         
        </section>
    </div>
</div> --}}




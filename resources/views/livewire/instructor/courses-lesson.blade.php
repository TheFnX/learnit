<div>
    @foreach ($section->lessons as $item)
        <article class="card mt-4" x-data="{open: false}">
            <div class="card-body">
                
                @if ($lesson->id == $item->id)  
                    <form wire:submit.prevent="update">
                        <div class="flex items-center">
                            <label class="w-32">Nombre:</label>
                            <input wire:model="lesson.name" class="w-full px-4 border-2 border-green-300 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded-md">
                        </div>
                        @error('lesson.name')
                            <span class="text-xs text-red-500">{{$message}}</span>
                        @enderror

                        {{-- <div class="flex items-center mt-4">
                            <label class="w-32">Plataforma:</label>
                            <select wire:model="lesson.platform_id" class="mt-1 block w-full py-2 px-3 border-2 border-green-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-green-200 focus:border-green-500 sm:text-sm">
                                @foreach ($platforms as $platform)
                                    <option value="{{$platform->id}}">{{$platform->name}}</option>
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="flex items-center mt-4">
                            <label class="w-32">Url:</label>
                            <input wire:model="lesson.url" class="w-full px-4 border-2 border-green-300 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded-md">
                        </div>
                        @error('lesson.url')
                            <span class="text-xs text-red-500">{{$message}}</span>
                        @enderror --}}

                        <div class="mt-2 flex justify-end">
                            <button type="submit" class="btn btn-success text-sm mr-2">Actualizar</button>
                            <button type="button" class="btn btn-danger text-sm" wire:click="cancel">Cancelar</button>

                        </div>
                    </form>
                @else 
                    <header>
                        <h1 x-on:click="open = !open" class="cursor-pointer"><i class="fas fa-bookmark text-green-500 mr-1"></i>Lección: {{$item->name}}</h1>
                    </header>                 
                    <div x-show="open">
                        <hr class="my-2">
                        {{-- <p class="text-sm">Plataforma: {{$item->platform->name}}</p>
                        <p class="text-sm">Enlace: <a class="text-blue-600" href="{{$item->url}}" target="_blank">{{$item->url}}</a></p> --}}

                        <div class="flex justify-end mt-2 mb-2">
                            <button class="btn btn-success text-sm mr-2" wire:click="edit({{$item}})">Editar</button>
                            <button class="btn btn-danger text-sm" wire:click="destroy({{$item}})">Eliminar</button>

                        </div>

                        {{-- <div class="mb-4">
                            @livewire('instructor.lesson-description', ['lesson' => $item], key('lesson-description-' . $item->id))
                        </div> --}}
                        {{-- Para subir recursos --}}
                        <div>
                            @livewire('instructor.lesson-resources', ['lesson' => $item], key('lesson-resources-' . $item->id))
                        </div>
                    </div>
                @endif

            </div>

        </article>
    @endforeach

    <div class="mt-4" x-data="{open: false}">
        <a x-show="!open" x-on:click="open = true" class="flex items-center cursor-pointer">
            <i class="far fa-plus-square text-2xl text-red-500 mr-2"></i>
            Agregar nuevo tema
        </a>
        <article class="card" x-show="open">
            <div class="card-body">
                <h1 class="text-xl font-bold mb-2">Agregar nueva tema</h1>
            
                <div class="mb-4">
                    <div class="flex items-center">
                        <label class="w-32">Nombre:</label>
                        <input wire:model="name" class="w-full px-4 border-2 border-green-300 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded-md">
                    </div>
                    @error('name')
                        <span class="text-xs text-red-500">{{$message}}</span>
                    @enderror

                    {{-- <div class="flex items-center mt-4">
                        <label class="w-32">Plataforma:</label>
                        <select wire:model="platform_id" class="mt-1 block w-full py-2 px-3 border-2 border-green-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-green-200 focus:border-green-500 sm:text-sm">
                            @foreach ($platforms as $platform)
                                <option value="{{$platform->id}}">{{$platform->name}}</option>
                            @endforeach
                        </select>
                        
                    </div>
                    @error('platform_id')
                        <span class="text-xs text-red-500">{{$message}}</span>
                    @enderror

                    <div class="flex items-center mt-4">
                        <label class="w-32">Url:</label>
                        <input wire:model="url" class="w-full px-4 border-2 border-green-300 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded-md">
                    </div>
                    @error('url')
                        <span class="text-xs text-red-500">{{$message}}</span>
                    @enderror --}}
                </div>
                <div class="flex justify-end">
                    <button class="btn btn-success" wire:click="store">Agregar</button>
                    <button class="btn btn-danger ml-2" x-on:click="open = false">Cancelar</button>

                </div>
            </div>
        </article>
    </div>
</div>

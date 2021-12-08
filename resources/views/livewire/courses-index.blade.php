{{-- <section class="mt-16">
    <h1 class="text-gray-600 text-center text-3xl mb-6">Contenido</h1>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-x-6 gap-y-8">
        <article>
            <figure>
                <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/content01.jpg')}}">
            </figure>

            <header class="mt-2">
                <h1 class="text-center text-xl text-gray-700"> Talleres</h1>
            </header>
            <p class="text-sm text-gray-500">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsa tenetur temporibus odio illum sapiente.</p>
        </article>
        <article>
            <figure>
                <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/content02.jpg')}}">
            </figure>

            <header class="mt-2">
                <h1 class="text-center text-xl text-gray-700"> Seminarios</h1>
            </header>
            <p class="text-sm text-gray-500">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsa tenetur temporibus odio illum sapiente.</p>
        </article>
        <article>
            <figure>
                <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/content03.png')}}">
            </figure>

            <header class="mt-2">
                <h1 class="text-center text-xl text-gray-700"> Conferencias</h1>
            </header>
            <p class="text-sm text-gray-500">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsa tenetur temporibus odio illum sapiente.</p>
        </article>
        <article>
            <figure>
                <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/content04.jpg')}}">
            </figure>

            <header class="mt-2">
                <h1 class="text-center text-xl text-gray-700"> Cursos</h1>
            </header>
            <p class="text-sm text-gray-500">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsa tenetur temporibus odio illum sapiente.</p>
        </article>

    </div>

</section> --}}
<div>
    <div class="bg-gray-200 py-4 mb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex">
            <button class="focus:outline-none bg-white shadow h-12 px-4 rounded-lg text-gray-700 mr-4" wire:click="resetFilters">
                <i class="fas fa-archive text-xs mr-2"></i>
                Todos los Cursos
            </button>

            <!-- Dropdown Categorias -->    
            <div class="relative mr-4" x-data={open:false}>
                <button class="px-4 text-gray-700 block h-12 rounded-lg overflow-hidden focus:outline-none bg-white shadow" x-on:click="open = true">                   
                    <i class="fas fa-ticket-alt text-sm mr-2"></i>
                    Categoria
                    <i class="fas fa-angle-down text-sm ml-2"></i>
                </button>
                <div class="absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl" x-show="open" x-on:click.away="open = false">   
                @foreach ($categories as $category)
                <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-green-500 hover:text-white" wire:click="$set('category_id', {{$category->id}})" x-on:click="open = false">{{$category->name}}</a>                    
                    
                @endforeach
                </div>
            </div>   
            <!-- Dropdown Levels -->    
            <div class="relative mr-4" x-data={open:false}>
                <button class="px-4 text-gray-700 block h-12 rounded-lg overflow-hidden focus:outline-none bg-white shadow" x-on:click="open = true">                   
                    <i class="fas fa-layer-group text-sm mr-2"></i>
                    Nivel
                    <i class="fas fa-angle-down text-sm ml-2"></i>
                </button>
                <div class="absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl" x-show="open" x-on:click.away="open = false">   
                @foreach ($levels as $level)
                <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-green-500 hover:text-white" wire:click="$set('level_id', {{$level->id}})" x-on:click="open = false">{{$level->name}}</a>                    
                    
                @endforeach
                </div>
            </div>              
            
            
             <!-- Dropdown Etiquetas --> 
             <div class="relative mr-4" x-data={open:false}>
                <button class="px-4 text-gray-700 block h-12 rounded-lg overflow-hidden focus:outline-none bg-white shadow" x-on:click="open = true">                   
                    <i class="fas fa-layer-group text-sm mr-2"></i>
                    Etiqueta
                    <i class="fas fa-angle-down text-sm ml-2"></i>
                </button>
                <div class="absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl" x-show="open" x-on:click.away="open = false">   
                @foreach ($tags as $tag)
                <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-green-500 hover:text-white" wire:click="$set('tag_id', {{$tag->id}})" x-on:click="open = false">{{$tag->name}}</a>                    
                    
                @endforeach
                </div>
            </div>   
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-x-6 gap-y-8">
        @foreach ($courses as $course)
            <x-course-card :course="$course"/>
        @endforeach
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 mb-8">
        {{$courses->links()}}
    </div>
    <br>
</div>


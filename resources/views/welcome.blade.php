<x-app-layout>

    <section class="bg-cover bg-center" style="background-image: url({{asset('img/learn.jpg')}})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">
            <div class="w-full md:w-3/4 lg:w-1/2">

                <h1 class="text-white font-fold text-4xl">Domina la tecnologia web con Learn<b>it</b></h1>
                <p class="text-white text-lg mt-2 mb-4">En Learnit encontras cursos, talleres, seminarios y otros que te ayudaran en tu formacion academica</p>
            
                <div class="pt-2 relative mx-auto text-gray-600">
                    <input class="w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
                    type="search" name="search" placeholder="Search">

                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded absolute right-0 top-0 mt-2">
                        Buscar
                    </button>
                    
                </div>

            </div>            
        </div>
    </section>

    <section class="mt-24">
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

    </section>

    <section class="mt-24 bg-green-700 py-12">
        <h1 class="text-center text-white text-3xl">¿No sabes qué curso llevar?</h1>
        <p class="text-center text-white">Dirígete al catálogo de cursos y filtralos por categorias o etiquetas.</p>
        <div class="flex justify-center mt-4">
            <a href="{{route('courses.index')}}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                Catálogo de cursos
            </a>
        </div>
    </section>

    <section class="my-24">
        <h1 class="text-center text-3xl text-gray-600">ÚLTIMOS CURSOS</h1>
        <p class="text-center text-gray-500 text-sm mb-6">Si conoces de algún evento acádemico puedes colaborar subiendo su información </p>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-x-6 gap-y-8">
            @foreach ($courses as $course)
                <x-course-card :course="$course"/>                
            @endforeach
        </div>
    </section>
</x-app-layout>


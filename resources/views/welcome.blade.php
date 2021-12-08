<x-app-layout>

    <section class="bg-cover bg-center" style="background-image: url({{asset('img/learn.jpg')}})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <div class="slider-content">
                    <h1 class="bg-green-500 rounded-t-lg text-white font-fold text-4xl"><b class="ml-4">Busca </b> eventos académicos</h1>
                    <h1 class="bg-white rounded-b-lg text-gray-500 text-lg"><p class="ml-4">En <b style="color: #05C46B">LearnIt</b> encontrarás la oferta de cursos de pre y postagrado que te ayudarán a complementar tu formacion académica.</p></h1>
                </div>               
                @livewire('search')

            </div>            
        </div>
    </section>

    <section class="my-12">
        <h1 class="text-center text-3xl text-gray-600 mb-8">ÚLTIMOS CURSOS</h1>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-x-6 gap-y-8">
            @foreach ($courses as $course)
                <x-course-card :course="$course"/>                
            @endforeach
        </div>
    </section>
    <section class="mt-24 bg-green-700 py-12">
        <h1 class="text-center text-white text-3xl">¿No encuentras lo que buscas?</h1>
        <p class="text-center text-white">Dirígete al catálogo de cursos y filtralos por categorias o etiquetas.</p>
        <div class="flex justify-center mt-4">
            <a href="{{route('courses.index')}}" class="btn btn-warning font-bold py-2 px-4 ">
                Catálogo de cursos
            </a>
        </div>
    </section>
</x-app-layout>


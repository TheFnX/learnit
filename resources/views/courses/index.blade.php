<x-app-layout>
    {{-- Portada --}}
    <section class="bg-cover bg-center" style="background-image: url({{asset('img/portada2.jpg')}})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">
            <div class="w-full md:w-3/4 lg:w-1/2">

                <h1 class="text-white font-fold text-4xl">Domina la tecnologia web con Learn<b>it</b></h1>
                <p class="text-white text-lg mt-2 mb-4">En Learnit encontras cursos, talleres, seminarios y otros que te ayudaran en tu formacion academica</p>
            
                @livewire('search')
                

            </div>            
        </div>
    </section>

    @livewire('courses-index')
</x-app-layout>
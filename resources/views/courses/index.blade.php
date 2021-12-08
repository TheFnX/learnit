<x-app-layout>
    {{-- Portada --}}
    <section class="bg-cover bg-center" style="background-image: url({{asset('img/portada2.jpg')}})">
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

    @livewire('courses-index')
</x-app-layout>
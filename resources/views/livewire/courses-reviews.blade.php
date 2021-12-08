<section class="mt-4 mb-8">
    <h1 class="font-bold text-3xl mb-2">Valoraciones</h1>

    <div class="card">
        <div class="card-body">            
            {{-- <p class="text-gray-800">{{$course->reviews->count()}} Valoraciones</p> --}}

            @foreach ($course->reviews as $review)
                <article class="flex mb-4 text-gray-800">
                    <figure class="mr-4">
                        <img class="h-12 w-12 object-cover rounded-full shadow-lg" src="{{$review->user->profile_photo_url}}" alt="">
                    </figure>

                    <div class="card flex-1">
                        <div class="card-body bg-gray-100">
                            <p><b>{{$review->user->name}}</b><i class="fas fa-star text-yellow-300 ml-5"></i>({{$review->rating}})</p>
                            {{$review->comment}}
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
    <br>
    @can('enrolled', $course)
        <article>
            
                <div class="card">
                    @can('valued', $course) 
                    <form class="card-body">     
                         
                        <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Agregar nuevo comentario</h2>
                        <div class="w-full md:w-full px-3 mb-2 mt-2">

                            <textarea wire:model="comment" class="bg-gray-100 w-full px-4 border-2 border-green-300 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded-md" name="body" placeholder='Tu opinión nos importa y nos ayuda a mejorar, dejanos tu valoración y un comentario' required></textarea>
                        </div>
                        <div>             
                            <div class="flex justify-end mb-4">
                                <ul class="flex items-center  mr-4">
                                    <li class="mr-1 cursor-pointer" wire:click="$set('rating', 1)"><i class="fas fa-star text-{{$rating >= 1 ? 'yellow' : 'gray'}}-300"></i></li>
                                    <li class="mr-1 cursor-pointer" wire:click="$set('rating', 2)"><i class="fas fa-star text-{{$rating >= 2 ? 'yellow' : 'gray'}}-300"></i></li>
                                    <li class="mr-1 cursor-pointer" wire:click="$set('rating', 3)"><i class="fas fa-star text-{{$rating >= 3 ? 'yellow' : 'gray'}}-300"></i></li>
                                    <li class="mr-1 cursor-pointer" wire:click="$set('rating', 4)"><i class="fas fa-star text-{{$rating >= 4 ? 'yellow' : 'gray'}}-300"></i></li>
                                    <li class="mr-1 cursor-pointer" wire:click="$set('rating', 5)"><i class="fas fa-star text-{{$rating == 5 ? 'yellow' : 'gray'}}-300"></i></li>
                                </ul>
                                <button class="btn btn-success mr-4" wire:click="store">Publicar</button>                        
                            </div>
                        </div>
                        
                    </form>
                    @else
                        <div class="overflow-hidden leading-normal rounded-lg" role="alert">                            
                            <p class="px-4 py-3 text-green-700 bg-green-100 ">Usted ya ha emitido una valoración.</p>
                        </div>                    
                    @endcan
                    
                </div>
            
        </article>
    @endcan
</section>

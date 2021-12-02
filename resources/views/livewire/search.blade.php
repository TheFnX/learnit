<form class="pt-2 relative mx-auto text-gray-600" autocomplete="off">
    <input wire:model="search" class="input w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
    type="search" name="search" placeholder="Ingresa el nombre de un curso">

    <button type="submit" class="btn btn-success font-bold py-2 px-4 absolute right-0 top-0 mt-2">
        Buscar
    </button>

    @if ($search)
        <ul class="absolute z-50 left-0 w-full bg-white mt-1 rounded-lg ">
            @forelse ($this->results as $result)
                <li class="leading-10 px-5 text-sm cursor-pointer hover:bg-green-300">
                    <a href="{{route('courses.show', $result)}}">{{$result->title}}</a>    
                </li>    
                @empty 
                <li class="leading-10 px-5 text-sm cursor-pointer hover:bg-green-300">
                    No existe ninguna coincidencia    
                </li>         
            @endforelse
        </ul>
    @endif
    
</form>
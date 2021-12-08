@props(['course'])


<article class="card flex flex-col">
    <img class="h-36 w-full object-cover" src="{{Storage::url($course->image->url)}}" alt="">

    <div class="card-body flex-1 flex flex-col">
        <h1 class="card-title"> {{Str::limit($course->title, 40)}}</h1>
        {{-- <p class="text-gray-500 text-sm mb-2 mt-auto">Prof: {{$course->teacher->name}}</p> --}}
        <div class="flex">
            <ul class="flex text-sm">
                <li class="mr-1"><i class="fas fa-star text-{{$course->rating >= 1 ? 'yellow' : 'gray'}}-400"></i></li>
                <li class="mr-1"><i class="fas fa-star text-{{$course->rating >= 2 ? 'yellow' : 'gray'}}-400"></i></li>
                <li class="mr-1"><i class="fas fa-star text-{{$course->rating >= 3 ? 'yellow' : 'gray'}}-400"></i></li>
                <li class="mr-1"><i class="fas fa-star text-{{$course->rating >= 4 ? 'yellow' : 'gray'}}-400"></i></li>
                <li class="mr-1"><i class="fas fa-star text-{{$course->rating == 5 ? 'yellow' : 'gray'}}-400"></i></li>
            </ul>
            <p class="text-sm text-gray-500 ml-auto">
                <i class="fas fa-users"></i>
                {{$course->students_count}}
            </p>
        </div>
        @if ($course->price == 0)
            <p class="my-2 text-green-700 font-bold">Gratis</p>            
        @else
            <p class="my-2 text-gray-500 font-bold">Bs. {{$course->price}}</p>  
        @endif

        @foreach ($course->tags as $tag)
            <a class="text-sm">{{$tag->name}}</a>            
        @endforeach
        {{-- <p class="text-gray-500 text-sm mb-2 mt-auto">{{$course->tag}}</p> --}}
        
        <div class="course-meta">							
            <!-- Course Info -->								
            <div class="course-info">																		
                <span><i class="fa fa-calendar-o"></i>{{ \Carbon\Carbon::parse($course->date)->format('d/m/Y')}}</span>
                <span class="float-right"><i class="fa fa-clock-o"></i>{{$course->time}}</span>
            </div>    
        </div>
        {{-- <div class="course-meta">                        
            <div class="course-info" >
                @foreach ($course->tags as $tag)
                    <a class="inline-block px-3 h-6 bg- text-Blue rounded-full">{{$tag->name}}</a>
                @endforeach
            </div>                        
        </div> --}}

        <a href="{{route('courses.show', $course)}}" class="btn btn-success btn-block">
            Más información
        </a>
    </div>
</article>
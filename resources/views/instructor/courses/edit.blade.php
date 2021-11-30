<x-app-layout>
    <div class="container py-8 grid grid-cols-5">
        <aside>
            <h1 class="font-bold text-lg mb-4">Edición del curso</h1>
            <ul class="text-sm text-gray-600">
                <li class="leading-7 mb-1 border-l-4 border-green-400 pl-2">
                    <a href="">Información del Curso</a>
                </li>
                <li class="leading-7 mb-1 border-l-4 border-transparent pl-2">
                    <a href="">Lecciones del Curso</a>
                </li>
                <li class="leading-7 mb-1 border-l-4 border-transparent pl-2">
                    <a href="">Metas del Curso</a>
                </li>
                <li class="leading-7 mb-1 border-l-4 border-transparent pl-2">
                    <a href="">Interesados</a>
                </li>
            </ul>
        </aside>

        <div class="col-span-4 card">
            <div class="card-body text-gray-600">
                <h1 class="text-2xl font-bold">Información del Curso</h1>
                <hr class="mt-2 mb-6">

                {!! Form::model($course, ['route' => ['instructor.courses.update', $course], 'method' => 'put', 'files' => true]) !!}
               
                @include('instructor.courses.partials.form')
                <div class="flex justify-end">
                    {!! Form::submit('Actualizar', ['class' => 'btn btn-success' ]) !!}
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <x-slot name=js>
        <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
        <script src="{{asset('js/instructor/courses/form.js')}}"></script> 
    </x-slot>
</x-app-layout>
<div>
    <article class="card" x-data="{open: false}">
        <div class="card-body bg-gray-100">
            <header>
                <h1 x-on:click="open = !open" class="cursor-pointer">Descripción de la lección</h1>
            </header>

            <div x-show="open">
                <hr class="my-2">

                @if ($lesson->description)
                    <form wire:submit.prevent="update">
                        <textarea wire:model="description.name" class="input w-full"></textarea>

                        @error('description.name')
                            <span class="text-sm text-red-500">{{$message}}</span>
                        @enderror

                        <div class="flex justify-end">
                            <button class="btn btn-success text-sm mr-2" type="submit">Actualizar</button>
                            <button wire:click="destroy" class="btn btn-danger text-sm" type="button">Eliminar</button>
                        </div>
                    </form>

                @else

                    <div>
                        <textarea wire:model="name" class="input w-full" placeholder="Agregue una descripción de la lección..."></textarea>
                        @error('name')
                            <span class="text-sm text-red-500">{{$message}}</span>
                        @enderror
                        <div class="flex justify-end">
                            <button wire:click="store" class="btn btn-success text-sm mr-2">Guardar</button>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </article>
</div>

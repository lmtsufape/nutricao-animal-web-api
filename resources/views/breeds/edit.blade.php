<x-app-layout >
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Raça') }}
        </h2>
    </x-slot>

    <div>
        @if($errors->any())
            <p class="alert alert-warning">{{ $errors }}</p>
        @endif
    </div>

    <form method="POST" class="pt-3 ">
        @csrf
        <div >
            <div class="row mx-3 mb-3 justify-content-center">
                <x-jet-label class="col-sm-1" for="name" value="{{ __('Nome') }}" />
                <div class="col-sm-5">
                    <x-jet-input id="name" class="form-control" type="text" name="name" value="{{$breed->name}}" required autofocus autocomplete="name" />
                </div>
            </div>
            <div class="row m-3 justify-content-center">
                <x-jet-label class="col-sm-1" for="type" value="{{ __('Tipo') }}" />
                <div class="col-sm-5">
                    <select id="type" name="type">
                        <option value="grande porte">Grande porte</option>
                        <option value="pequeno porte">Pequeno porte</option>
                    </select>
                </div>
            </div>
            <div class="row m-3 justify-content-center  ">
                <x-jet-label class="col-sm-1" for="species" value="{{ __('Espécie') }}" />
                <div class="col-sm-5">
                    <select id="species" name="species">
                        <option value="Gato">Gato</option>
                        <option value="Cachorro">Cachorro</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-center mt-4 mr-6">
            <x-jet-button class="ml-4">
                <a href="{{ route('breeds.index') }}" style="text-decoration: none; color: white;" >
                    {{ __('Voltar') }}
                </a>
            </x-jet-button>

            <x-jet-button class="ml-4">
                {{ __('Editar') }}
            </x-jet-button>
        </div>
    </form>
</x-app-layout>

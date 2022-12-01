<x-app-layout >
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Adicionar Raça') }}
        </h2>
    </x-slot>

    <form method="POST" class="pt-3 ">
        @csrf
        <div >
            <div class="row mx-3 mb-3 justify-content-center">
                <x-jet-label class="col-sm-1" for="name" value="{{ __('Nome') }}" />
                <div class="col-sm-5">
                    <x-jet-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>
            </div>
            <div class="row m-3 justify-content-center">
                <x-jet-label class="col-sm-1" for="type" value="{{ __('Tipo') }}" />
                <div class="col-sm-5">
                    <x-jet-input id="type" class="form-control" type="text" name="type" :value="old('type')" required />
                </div>
            </div>
            <div class="row m-3 justify-content-center  ">
                <x-jet-label class="col-sm-1" for="species" value="{{ __('Especie') }}" />
                <div class="col-sm-5">

                    <x-jet-input id="species" class="form-control" type="text" name="species" required autocomplete="new-species" />
                </div>
            </div>
        </div>
        <div class="flex items-center justify-center mt-4 mr-6">
            <x-jet-button class="ml-4">
                {{ __('Voltar') }}
            </x-jet-button>

            <x-jet-button class="ml-4">
                {{ __('Adicionar') }}
            </x-jet-button>
        </div>
    </form>
</x-app-layout>

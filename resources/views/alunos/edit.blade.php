<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Aluno') }}
        </h2>
    </x-slot>

    <form method="POST" class="pt-3">
        @csrf
        <div class="">
            <div class="row mx-3 mb-2 justify-content-center">
                <x-jet-label class="col-sm-1" for="name" value="{{ __('Nome') }}" />
                <div class="col-sm-5">
                    <x-jet-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>
            </div>
            <div class="row mx-3 my-2 justify-content-center">
                <x-jet-label class="col-sm-1" for="email" value="{{ __('Email') }}" />
                <div class="col-sm-5">
                    <x-jet-input id="email" class="form-control" type="text" name="email" :value="old('email')" required />
                </div>
            </div>
            <div class="row mx-3 my-2 justify-content-center  ">
                <x-jet-label class="col-sm-1" for="password" value="{{ __('Senha') }}" />
                <div class="col-sm-5">

                    <x-jet-input id="password" class="form-control" type="password" name="password" required />
                </div>
            </div>
            <div class="row m-3 justify-content-center  ">
                <x-jet-label class="col-sm-1" for="password_confirmation" value="{{ __('Confirme a senha') }}" />
                <div class="col-sm-5">

                    <x-jet-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required />
                </div>
            </div>
        </div>
        <div class="flex items-center justify-center mt-4 mr-6">
            <x-jet-button class="ml-4">
                {{ __('Voltar') }}
            </x-jet-button>
            <x-jet-button class="ml-4">
                {{ __('Editar') }}
            </x-jet-button>
        </div>
    </form>
</x-app-layout>

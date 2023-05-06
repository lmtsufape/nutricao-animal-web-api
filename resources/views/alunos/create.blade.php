<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Adicionar Aluno') }}
        </h2>
    </x-slot>

    <div>
        @if($errors->any())
            <p class="alert alert-warning">{{ $errors }}</p>
        @endif
    </div>

    <form method="POST" class="pt-3">
        @csrf
        <div class="">
            <div class="row mx-3 mb-2 justify-content-center">
                <x-jet-label class="col-sm-1" for="name" value="{{ __('Nome') }}" />
                <div class="col-sm-5">
                    <x-jet-input id="name" class="form-control" type="text" name="name" :value="old('name')" placeholder="Nome completo" required autofocus autocomplete="name" />
                </div>
            </div>
            <div class="row mx-3 my-2 justify-content-center">
                <x-jet-label class="col-sm-1" for="email" value="{{ __('E-mail') }}" />
                <div class="col-sm-5">
                    <x-jet-input id="email" class="form-control" type="text" name="email" :value="old('email')" placeholder="E-mail" required />
                </div>
            </div>
            <div class="row mx-3 my-2 justify-content-center  ">
                <x-jet-label class="col-sm-1" for="cpf" value="{{ __('CPF') }}" />
                <div class="col-sm-5">

                    <x-jet-input id="cpf" class="form-control" type="text" name="cpf" placeholder="Formato 999.999.999-99" required />
                </div>
            </div>
            <div class="row mx-3 my-2 justify-content-center  ">
                <x-jet-label class="col-sm-1" for="password" value="{{ __('Senha') }}" />
                <div class="col-sm-5">

                    <x-jet-input id="password" class="form-control" type="password" name="password" placeholder="Senha deve ter 8 caracteres" required />
                </div>
            </div>
            <div class="row m-3 justify-content-center  ">
                <x-jet-label class="col-sm-1" for="password_confirmation" value="{{ __('Confirme a senha') }}" />
                <div class="col-sm-5">

                    <x-jet-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" placeholder="Repita a senha" required />
                </div>
            </div>
        </div>
        <div class="flex items-center justify-center mt-4 mr-6">
            <x-jet-button class="ml-4">
                <a href="{{ route('alunos.index') }}" style="text-decoration: none; color: white;" >
                    {{ __('Voltar') }}
                </a>
            </x-jet-button>
            <x-jet-button class="ml-4">
                {{ __('Adicionar') }}
            </x-jet-button>
        </div>
    </form>
</x-app-layout>

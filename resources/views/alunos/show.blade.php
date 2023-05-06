<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Página de Alunos') }}
        </h2>
    </x-slot>
    <div class="container">
        <table class="table table-striped-columns">
            <thead>
                <th class="table-dark">Nome</th>
                <th class="table-dark">Email</th>
                <th class="table-dark">Cargo</th>
                <th class="table-dark">CPF</th>
                <tbody>
                    <tr>
                        <td class="table-success">{{ $user->name }}</td>
                        <td class="table-success">{{ $user->email }}</td>
                        <td class="table-success">{{ $user->role }}</td>
                        <td class="table-success">{{ $user->cpf }}</td>
                    </tr>
                </tbody>
            </thead>
        </table>
        <x-jet-button class="ml-4">
            <a href="{{ route('alunos.index') }}" style="text-decoration: none; color: white;" >
                {{ __('Voltar') }}
            </a>
        </x-jet-button>
    </div>

  </x-app-layout>

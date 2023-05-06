<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Página da Raça') }}
        </h2>
    </x-slot>
    <div>
        <table class="table table-striped-columns">
            <thead>
                <th class="table-dark">Nome da raça</th>
                <th class="table-dark">Tipo</th>
                <th class="table-dark">Espécie</th>
                <th class="table-dark">Cadastrado por</th>
            </thead>

            <tr>
                <td class="table-success">{{ $breed->name }}</td>
                <td class="table-success">{{ucfirst($breed->type) }}</td>
                <td class="table-success">{{ $breed->species }}</td>
                <td class="table-success">{{ $breed->user->name }}</td>
              </tr>

        </table>
        <x-jet-button class="ml-4">
            <a href="{{ route('breeds.index') }}" style="text-decoration: none; color: white;" >
                {{ __('Voltar') }}
            </a>
        </x-jet-button>
    </div>




</x-app-layout>


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
                <th class="table-dark">Usuário</th>
            </thead>

            <tr>
                <td class="table-success">{{ $breed->name }}</td>
                <td class="table-success">{{ $breed->type }}</td>
                <td class="table-success">{{ $breed->species }}</td>
                <td class="table-success"> {{$breed->user_id}}</td>
                
              </tr>

        </table>
    </div>
    



</x-app-layout>


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Página de Alunos') }}
        </h2>
    </x-slot>
    <a href="{{route('alunos.create')}}" class="btn btn-success mt-2 mb-2" >Adicionar</a>
    <table class="table table-striped-columns">
        <thead>
            <th class="table-dark">Nome</th>
            <th class="table-dark">Email</th>
            <th class="table-dark">Cargo</th>
            <th class="table-dark">Ações</th>
            @foreach ($users as $user)
            <tr>
                <td class="table-success">{{ $user->name }}</td>
                <td class="table-success">{{ $user->email }}</td>
                <td class="table-success">{{ $user->role }}</td>
                <td class="table-success">
                    <form method="post" action="{{route('alunos.remove', ['id' => $user->id])}}">
                @csrf
                @method('DELETE')
                    <button class="btn btn-danger btn-sm">
                        Deletar

                    </button>

                </form>
                <span class="d-flex"><a href="{{route('alunos.show',['id' => $user->id])}}">Mostrar</a>
                </span> </td>
            </tr>
            @endforeach
        </thead>
  </x-app-layout>

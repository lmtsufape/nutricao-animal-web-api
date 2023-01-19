<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Página de Alunos') }}
        </h2>
    </x-slot>
    <div class="container">
        <div class="d-flex justify-content-end">
            <a href="{{route('alunos.create')}}" class="btn btn-success mt-2 mb-2" >Adicionar</a>
        </div>
        <table class="table table-striped-columns">
            <thead>
                <th class="table-dark w-5"></th>
                <th class="table-dark w-25">Nome</th>
                <th class="table-dark w-25">Email</th>
                <th class="table-dark w-25">Cargo</th>
                <th class="table-dark w-20">Ações</th>
            </thead>   
            <tbody class="text-center">
                @foreach ($users as $user)
                <tr >
                    <td class="table-success">{{ $loop->index+1 }}</td>
                    <td class="table-success">{{ $user->name }}</td>
                    <td class="table-success">{{ $user->email }}</td>
                    <td class="table-success">{{ $user->role }}</td>
                    <td class="table-success d-flex ">
                        <form method="post" action="{{route('alunos.remove', ['id' => $user->id])}}">
                    @csrf
                    @method('DELETE')
                        <button class="btn btn-danger btn-sm m-1">
                            Deletar
                        </button>
                    </form>
                        <a class="btn btn-primary btn-sm m-1" href="{{route('alunos.edit',['id' => $user->id])}}">Editar</a>
                        <a class="btn btn-info btn-sm m-1" href="{{route('alunos.show',['id' => $user->id])}}">Mostrar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
  </x-app-layout>

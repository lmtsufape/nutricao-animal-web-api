<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Página de Raças') }}
        </h2>
    </x-slot>
    <div class="container ">
        <div class="d-flex justify-content-end">
            <a href="{{route('breeds.create')}}" class="btn btn-success m-2" >Adicionar Raça</a>
        </div>
        <table class="table table-striped-columns ">
            <thead>
                <th class="table-dark w-5"></th>
                <th class="table-dark w-25">Nome</th>
                <th class="table-dark w-25">Tipo</th>
                <th class="table-dark w-25">Espécie</th>
                <th class="table-dark w-20">Ações</th>
            </thead>
            <tbody class="tex-center">
                @foreach ($breeds as $breed)
                <tr>
                    <td class="table-success">{{ $loop->index+1 }}</td>
                    <td class="table-success">{{ $breed->name }}</td>
                    <td class="table-success">{{ $breed->type  }}</td>
                    <td class="table-success">{{ $breed->species == 'cat' ? 'Gato' : 'Cachorro' }}</td>
                    <td class="table-success d-flex">
                        <form method="post" action="{{route('breeds.remove', ['id' => $breed->id])}}">
                    @csrf
                    @method('DELETE')
                        <button class="btn btn-danger btn-sm m-1">
                            Deletar
                        </button>
                    </form>
                        <a class="btn btn-primary btn-sm m-1" href="{{route('breeds.edit',['id' => $breed->id])}}">Editar</a>
                        <a class="btn btn-info btn-sm m-1" href="{{route('breeds.show',['id' => $breed->id])}}">Mostrar</a>
                    </td>
                </tr>
                @endforeach
            </tbody> 
        </table>
    </div>
</x-app-layout>


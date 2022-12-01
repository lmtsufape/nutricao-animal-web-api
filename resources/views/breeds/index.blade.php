<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Página de Raças') }}
        </h2>

        <div>
            <div class="input-group">
                <div id="search-autocomplete" class="form-outline">

                    <input type="search" id="form1" class="form-control" />

                </div>
            </div>
        </div>
    </x-slot>
    <a href="{{route('breeds.create')}}" class="btn btn-success mt-2 mb-2" >Adicionar Raça</a>
    <table class="table table-striped-columns">
        <thead>
            <th class="table-dark">Nome</th>
            <th class="table-dark">Tipo</th>
            <th class="table-dark">Especie</th>
            <th class="table-dark">Ações</th>
            @foreach ($breeds as $breed)
            <tr>
                <td class="table-success">{{ $breed->name }}</td>
                <td class="table-success">{{ $breed->type }}</td>
                <td class="table-success">{{ $breed->species }}</td>
                <td class="table-success">
                    <form method="post" action="{{route('breeds.remove', ['id' => $breed->id])}}">
                @csrf
                @method('DELETE')
                    <button class="btn btn-danger btn-sm">
                        Deletar

                    </button>

                </form>
                <span class="d-flex"><a href="{{route('breeds.show',['id' => $breed->id])}}">Mostrar</a>
                </span> </td>
            </tr>
            @endforeach
        </thead>

</x-app-layout>


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Página de alimentos') }}
        </h2>
    </x-slot>
    <div class="container">
        <div class="d-flex justify-content-end">
            <a href="{{route('foods.create')}}" class=" btn btn-success m-2" >Adicionar</a>
        </div>
        <table class="table table-striped-columns">
            <thead>
                <th class="table-dark w-5"></th>
                <th class="table-dark w-25">Nome</th>
                <th class="table-dark w-25">Categoria</th>
                <th class="table-dark w-25">Carboidratos</th>
                <th class="table-dark w-20">Ações</th>
            </thead>
            <tbody class="text-center">
                @foreach ($foods as $food)
                <tr>
                    <td class="table-success">{{$loop->index+1}}</td>
                    <td class="table-success">{{ucfirst($food->name) }}</td>
                    <td class="table-success">{{ucfirst($food->category) }}</td>
                    <td class="table-success">{{ $food->carbohydrates }}</td>
                    <td class="table-success d-flex">
                        <form method="post" action="{{route('foods.remove', ['id' => $food->id])}}">
                      @csrf
                      @method('DELETE')
                        <button class="btn btn-danger btn-sm m-1">
                            Deletar
                        </button>
                      </form>
                        <a class="btn btn-primary btn-sm m-1" href="{{route('foods.edit',['id' => $food->id])}}">Editar</a>
                        <a class="btn btn-info btn-sm m-1" href="{{route('foods.show',['id' => $food->id])}}">Mostrar</a>
                      </td>
                  </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>


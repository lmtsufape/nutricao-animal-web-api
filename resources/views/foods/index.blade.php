<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Página de alimentos') }}
        </h2>


    </x-slot>
    <div>
        <a href="{{route('foods.create')}}" class="btn btn-success mt-2 mb-2" >Adicionar</a>
        <table class="table table-striped-columns">
            <thead>
                <th class="table-dark">Nome</th>
                <th class="table-dark" >Categoria</th>
                <th class="table-dark">Carboidratos</th>
                <th class="table-dark">Ações</th>
            </thead>
            @foreach ($foods as $food)
            <tr>
                <td class="table-success">{{ $food->name }}</td>
                <td class="table-success">{{ $food->category }}</td>
                <td class="table-success">{{ $food->carbohydrates }}</td>
                <td class="table-success">
                    <form method="post" action="{{route('foods.remove', ['id' => $food->id])}}">
                  @csrf
                  @method('DELETE')
                    <button class="btn btn-danger btn-sm">
                        Deletar

                    </button>

                  </form>
                  <span class="d-flex"><a href="{{route('foods.show',['id' => $food->id])}}">Mostrar</a>
                  </span> </td>
              </tr>
            @endforeach
        </table>
    </div>




</x-app-layout>


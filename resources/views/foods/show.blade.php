<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mostrar Alimento') }}
        </h2>
    </x-slot>
    <div class="text-center p-1" >
        <table class="table table-striped-columns">
            <thead>
                <th class="table-dark">Alimento</th>
                <th class="table-dark">Categoria</th>
                <th class="table-dark">Carboidratos</th>
                <th class="table-dark">Lipídios</th>
                <th class="table-dark">Cálcio</th>
                <th class="table-dark">Proteína </th>
                <th class="table-dark">Fibra</th>
                <th class="table-dark">Valor energético</th>
                <th class="table-dark">Umidade</th>
            </thead>
            <tr>
                <td class="table-success">{{ $food->name }}</td>
                <td class="table-success">{{ $food->category }}</td>
                <td class="table-success">{{ $food->carbohydrates }}</td>
                <td class="table-success">{{ $food->lipids }}</td>
                <td class="table-success">{{ $food->calcium }}</td>
                <td class="table-success">{{ $food->protein_value }}</td>
                <td class="table-success">{{ $food->fiber }}</td>
                <td class="table-success">{{ $food->energetic_value }}</td>
                <td class="table-success">{{ $food->moisture }}</td>
              </tr>
        </table>
        <x-jet-button class="ml-4">
            <a href="{{ route('foods.index') }}" style="text-decoration: none; color: white;" >
                {{ __('Voltar') }}
            </a>
        </x-jet-button>
    </div>



</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mostrar Alimento') }}
        </h2>
    </x-slot>
    <div class="text-center p-1" >
        <ul>
            <li>Alimento - {{$food->name}}</li>
            <li>Categoria - {{$food->category}}</li>
            <li>Carboidratos - {{$food->carbohydrates}}</li>
            <li>Lipidos - {{$food->lipids}}</li>
            <li>Calcio - {{$food->calcium}}</li>
            <li>Proteina - {{$food->protein_value}}</li>
            <li>Fibra - {{$food->fiber}}</li>
            <li>Valor energetico - {{$food->energetic_value}}</li>
            <li>Umidade - {{$food->moisture}}</li>
        </ul>
    </div>



</x-app-layout>

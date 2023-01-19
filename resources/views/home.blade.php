<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
        
    </x-slot>
    <div class="container d-flex justify-content-center mt-2">
        <div class=" hidden space-x-10 sm:-my-px sm:ml-10 sm:flex">
            <a class="btn btn-info" href="{{ route('foods.index') }}">
                {{ __('Alimentos') }}
            </a>
        </div>
        <div class=" hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <a class="btn btn-info" href="{{ route('breeds.index') }}">
                {{ __('Raças') }}
            </a> 
        </div>
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <a class="btn btn-info" href="{{ route('breeds.index') }}">
                {{ __('Alunos') }}
            </a>
        </div>
    </div>   
</x-app-layout>
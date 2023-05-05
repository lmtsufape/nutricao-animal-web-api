<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Adicionar Alimento') }}
        </h2>
    </x-slot>

    <div>
        <p>{{$errors->any() ? $errors : ''}}</p>
    </div>

    <form method="POST" class="pt-3 ">
        @csrf
        <div>
            <div class="row mx-3 mb-3 justify-content-center">
                <x-jet-label class="col-sm-1" for="name" value="{{ __('Nome') }}" />
                <div class="col-sm-3">
                    <x-jet-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>
                <x-jet-label class="col-sm-1" for="category" value="{{ __('Categoria') }}" />
                <div class="col-sm-3">
                    <select id="category" name="category">
                        <option value="Ração">Ração</option>
                        <option value="Carne">Carne</option>
                        <option value="Vegetal">Vegetal</option>
                        <option value="Frutas">Frutas</option>
                        <option value="Verdura">Verdura</option>
                    </select>
                </div>
                <x-jet-label class="col-sm-1" for="lipids" value="{{ __('Lipídos') }}" />
                <div class="col-sm-3">

                    <x-jet-input id="lipids" class="form-control" type="text" name="lipids" :value="old('lipids')" required />
                </div>
            </div>
            <div class="row mx-3 mb-3 justify-content-center">
                <x-jet-label class="col-sm-1" for="moisture" value="{{ __('Umidade') }}" />
                <div class="col-sm-3">
                    <x-jet-input id="moisture" class="form-control" type="text" name="moisture" :value="old('moisture')" required />
                </div>
                <x-jet-label class="col-sm-1" for="energetic_value" value="{{ __('Valor energético') }}" />
                <div class="col-sm-3">

                    <x-jet-input id="energetic_value" class="form-control" type="text" name="energetic_value" :value="old('energetic_value')" required />
                </div>
                <x-jet-label class="col-sm-1" for="protein_value" value="{{ __('Proteína') }}" />
                <div class="col-sm-3">

                    <x-jet-input id="protein_value" class="form-control" type="text" name="protein_value" :value="old('protein_value')" required />
                </div>
            </div>


            <div class="row mx-3 mb-3 justify-content-center">
                <x-jet-label  class="col-sm-1" for="calcium" value="{{ __('Cálcio') }}" />
                <div class="col-sm-3">

                    <x-jet-input id="calcium" class="form-control" type="text" name="calcium" :value="old('calcium')" required />
                </div>
                <x-jet-label class="col-sm-1" for="fiber" value="{{ __('Fibra') }}" />
                <div class="col-sm-3">

                    <x-jet-input id="fiber" class="form-control" type="text" name="fiber" :value="old('fiber')" required />
                </div>
                <x-jet-label class="col-sm-1" for="carbohydrates" value="{{ __('Carboidratos') }}" />
                <div class="col-sm-3">

                    <x-jet-input id="carbohydrates" class="form-control" type="text" name="carbohydrates" :value="old('carbohydrates')" required  />
                </div>
            </div>
        </div>
        <div class="flex items-center justify-end mt-4">

            <x-jet-button class="ml-4">
                {{ __('Adicionar') }}
            </x-jet-button>
        </div>
    </form>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cadastrar Novo Veículo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    {{-- o atributo action aponta para a rota que está direcionada ao método store do controlador --}}
                    <form class="form" method="POST" action="{{ route('vehicles.store') }}">
                        {{-- CSRF é um token de segurança para validar o formulário --}}
                        @csrf
                        <div class="py-4">
                        <label for="Nome">Nome:</label>
                        </div>
                        <div class="w-full text-gray-900">
                        <input type="text" name="name" id="name" class="w-full" required >
                        </div>
                        <div class="py-4">
                        <label for="Nome">Ano:</label>
                        </div>
                        <div class="w-full text-gray-900">
                        <input type="number" name="year" id="year" class="w-full" required >
                        </div>
                        <div class="py-4">
                        <label for="Nome">Cor:</label>
                        </div>
                        <div class="w-full text-gray-900">
                        <input type="text" name="color" id="color" class="w-full" required >
                        </div>
                        <div >
                        <div class= "py-5">
                        <input type="submit" value="Salvar" class= "px-6 py4 shadow rounded text-white text-bold bg-yellow-500 hover:bg-yellow-700 transition ease-in-ou duration-300">
                        <input type="reset" value="Limpar" class= "px-6 py4 shadow rounded text-white text-bold bg-yellow-500 hover:bg-yellow-700 transition ease-in-ou duration-300">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

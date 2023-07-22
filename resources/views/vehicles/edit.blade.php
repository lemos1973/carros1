<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Atualizar um Veículo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="w-full p-6 text-gray-900 dark:text-gray-100">

                {{-- o atributo action aponta para a rota que está direcionada ao método store do controlador --}}
                <form class="form" id="update-form" method="POST" action="{{ route('vehicles.update', $vehicle->id) }}">
                    {{-- CSRF é um token de segurança para validar o formulário --}}
                    @csrf
                    {{-- o método de atualização é o PUT --}}
                    @method('PUT')
                    <div class="py-4">
                    <label for="Nome">Nome:</label>
                    </div>
                    <div class="w-full text-gray-900">
                    <input type="text" name="name" id="name" class="w-full" required value="{{ $vehicle->name }}">
                    </div>
                    <div class="py-4">
                    <label for="Nome">Ano:</label>
                    </div>
                    <div class="w-full text-gray-900">
                    <input type="number" name="year" id="year" class="w-full" required value="{{ $vehicle->year }}">
                    </div>
                    <div class="py-4">
                    <label for="Nome">Cor:</label>
                    </div>
                    <div class="w-full text-gray-900">
                    <input type="text" name="color" id="color" class="w-full" required value="{{ $vehicle->color }}">
                    </div>
                </form>
                {{-- note que os botões estão fora dos forms. O atributo form indica qual form o botão pertence --}}
                <div class="py-4">
                <button form="update-form" type="submit" class= "px-6 py4 shadow rounded text-white text-bold bg-yellow-500 hover:bg-yellow-700 transition ease-in-ou duration-300">Salvar</button>
                <button form="delete-form" type="submit" value="Excluir" class= "px-6 py4 shadow rounded text-white text-bold bg-yellow-500 hover:bg-yellow-700 transition ease-in-ou duration-300">Excluir</button>
                </div>
                {{-- form para exclusão --}}
                <form method="POST" class="form" id="delete-form" action="{{ route('vehicles.destroy', $vehicle->id) }}">
                    @csrf
                    {{-- o método HTTP para exclusão deve ser o DELETE --}}
                    @method('DELETE')
                </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

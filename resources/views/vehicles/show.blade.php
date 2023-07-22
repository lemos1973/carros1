<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mostrando dados do veículo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                 {{-- caso exista a variável msg, exibe uma mensagem --}}
                @if (isset($msg))
                <h3 style="color: red">Veículo não encontrado!</h3>
                @else
                {{-- senão, mostra os daddos --}}
                    <p><strong>Nome:</strong> {{ $vehicle->name }} </p>
                    <p><strong>Ano:</strong> {{ $vehicle->year }} </p>
                    <p><strong>Cor:</strong> {{ $vehicle->color }} </p>

                @endif
                <div class="py-6 w-full mb-5 flex">
                    <a href="{{ route('vehicles.index') }}" class= "px-4 py4 shadow rounded text-white text-bold bg-yellow-500 hover:bg-yellow-700 transition ease-in-ou duration-300">Voltar</a>
                </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

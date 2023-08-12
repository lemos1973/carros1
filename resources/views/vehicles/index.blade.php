<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Veículos Cadastrados') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="w-full mb-5 flex justify-end">
                        <a href="{{ route('vehicles.create') }}" class= "px-4 py4 shadow rounded text-white text-bold bg-yellow-500 hover:bg-yellow-700 transition ease-in-ou duration-300">Cadastrar Veículo</a>
                    </div>

                    {{-- se a variável $vehicles não existir, mostra um h3 com uma mensagem --}}
                        @if (!isset($vehicles))
                        <h3 style="color: red">Nenhum Registro Encontrado!</h3>
                        {{-- senão, monta a tabela com o dados --}}
                        @else
                            <table class= "w-full text-gray-900 bg-white rounded shadow">
                                <thead>
                                    <tr>
                                        <th class= "px-2 py-2 text-left">Nome</th>
                                        <th class= "px-2 py-2 text-left">Ano</th>
                                        <th class= "px-2 py-2 text-left">Cor</th>
                                        <th class= "px-2 py-2 text-left">Opções</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- itera sobre a coleção de veículos criando a variável v --}}
                                    @foreach ($vehicles as $v)
                                        <tr>
                                            <td class= "px-2 py-2 text-left">{{ $v->name }} </td>
                                            <td class= "px-2 py-2 text-left"> {{ $v->year }} </td>
                                            <td class= "px-2 py-2 text-left"> {{ $v->color }} </td>
                                            {{-- vai para a rota show, passando o id como parâmetro --}}
                                            <td class= "px-2 py-2 text-left"> <a href="{{ route('vehicles.show', $v->id) }}" class= "px-4 py2 shadow rounded text-white text-bold bg-blue-700 hover:bg-blue-900 transition ease-in-ou duration-300">Exibir</a> </td>
                                            <td class= "px-2 py-2 text-left"> <a href="{{ route('vehicles.edit', $v->id) }}" class= "px-4 py2 shadow rounded text-white text-bold bg-yellow-500 hover:bg-yellow-700 transition ease-in-ou duration-300">Editar</a> </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                        @if(session('msg'))
                            <script>
                                alert("{{session('msg')}}");
                            </script>
                        @endif


                </div>
                <div class="text white mt-2">
                {{ $vehicles->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

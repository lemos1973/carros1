<?php

namespace App\Http\Controllers;

use App\Http\Requests\Vehicle\StoreRequest; //validação
use App\Http\Requests\Vehicle\UpdateRequest;
use Illuminate\Http\Request;
use App\Models\Vehicle;

class VehicleController extends Controller
{
    /**
     * Protegendo o método.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //..recuperando todos os veículos do banco de dados sem paginação
        //$vehicles = Vehicle::all();

        //..enviando os dados paginados com limite 10
        $vehicles = Vehicle::orderBy('id', 'desc')->paginate(10); // ordenado por id últimos primeiro - padrão asc

        //..retorna a view index passando a variável $vehicles
        return view('vehicles.index')->with('vehicles', $vehicles);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //..mostrando o formulário de cadastro
        return view('vehicles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        //..instancia um novo model Vehicle
        // $vehicle = new Vehicle();
        // //..pega os dados vindos do form e seta no model
        // $vehicle->name = $request->input('name');
        // $vehicle->year = $request->input('year');
        // $vehicle->color = $request->input('color');
        // //..persiste o model na base de dados
        $vehicle = Vehicle::create($request->validated());
        // $vehicle->save();
        //..retorna a view com uma variável msg que será tratada na própria view
        //$vehicles = Vehicle::all();

        // $vehicles = Vehicle::paginate(10);
        // return view('vehicles.index')->with('vehicles', $vehicles)
        //     ->with('msg', 'Veículo cadastrado com sucesso!');

        return redirect()->route("vehicles.index")->with('msg', 'Veículo cadastrado com sucesso!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //..recupera o veículo da base de dados
         $vehicle = Vehicle::find($id);
        // //..se encontrar o veículo, retorna a view com o objeto correspondente
        // if ($vehicle) {
        //     return view('vehicles.show')->with('vehicle', $vehicle);
        // } else {
        //     //..senão, retorna a view com uma mensagem que será exibida.
        //     return view('vehicles.show')->with('msg', 'Veículo não encontrado!');
        // }

        if (!$vehicle){
            //se não encontrar a variável
            return redirect()->route("vehicles.index")->with('msg', 'Veículo não encontrado!');
        }
        return view("vehicles.show", compact("vehicle"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //..recupera o veículo da base de dados
        $vehicle = Vehicle::find($id);
        //..se encontrar o veículo, retorna a view de ediçãcom com o objeto correspondente

        // if ($vehicle) {
        //     return view('vehicles.edit')->with('vehicle', $vehicle);
        // } else {
        //     //..senão, retorna a view de edição com uma mensagem que será exibida.
        //     $vehicles = Vehicle::paginate(10);
        //     return view('vehicles.index')->with('vehicles', $vehicles)
        //         ->with('msg', 'Veículo não encontrado!');
        // }

        if (!$vehicle){
            //se não encontrar a variável
            return redirect()->route("vehicles.index")->with('msg', 'Veículo não encontrado!');
        }
        return view("vehicles.edit", compact("vehicle"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        ///..recupera o veículo mediante o id
        $vehicle = Vehicle::find($id);
        $vehicle->update($request->validated());
        //..atualiza os atributos do objeto recuperado com os dados do objeto Request
        // $vehicle->name = $request->input('name');
        // $vehicle->year = $request->input('year');
        // $vehicle->color = $request->input('color');
        // //..persite as alterações na base de dados
        // $vehicle->save();
        // //..retorna a view index com uma mensagem
        // $vehicles = Vehicle::paginate(10);
        // return view('vehicles.index')->with('vehicles', $vehicles)
        //     ->with('msg', 'Veículo atualizado com sucesso!');

        return redirect()->route('vehicles.index')->with('msg', 'Veículo atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //..recupeara o recurso a ser excluído
        $vehicle = Vehicle::find($id);

        if (!$vehicle){
            //se não encontrar a variável
            return redirect()->route("vehicles.index")->with('msg', 'Veículo não encontrado!');
        }
        //..exclui o recurso
        $vehicle->delete();
        //..retorna à view index.
        // $vehicles = Vehicle::paginate(10);
        // return view('vehicles.index')->with('vehicles', $vehicles)
        //     ->with('msg', "Veículo excluído com sucesso!");

        return redirect()->route('vehicles.index')->with('msg', 'Veículo excluído com sucesso!');
    }
}

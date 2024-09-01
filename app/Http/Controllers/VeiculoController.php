<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use App\Models\Veiculos;
use Illuminate\Http\Request;

class VeiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  Veiculo::orderBy('created_at', 'desc')->get();
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $this->validateRequest($request);
            $veiculo = Veiculo::create($validatedData);

            return response()->json($veiculo, 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Dados inválidos.',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Ocorreu um erro ao processar sua solicitação.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $veiculo = Veiculo::find($id);

        if (!$veiculo) {
            return response()->json(['message' => 'Veículo não encontrado'], 404);
        }

        return response()->json($veiculo, 200);
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            // $validatedData = $this->validateRequest($request);
            $validatedData = $this->validateRequest($request, $id);

            $veiculo = Veiculo::findOrFail($id);
            $veiculo->update($validatedData);

            return response()->json($veiculo, 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Dados inválidos.',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Ocorreu um erro ao processar sua solicitação.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $veiculo = Veiculo::findOrFail($id);
            $veiculo->delete();

            return response()->json([
                'message' => 'Veículo deletado com sucesso.'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Ocorreu um erro ao processar sua solicitação',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Validates the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    private function validateRequest(Request $request, $id = null)
    {
        $rules = [
            'placa' => [
                'required',
                'string',
                'size:7',
                $id ? 'unique:veiculos,placa,' . $id : 'unique:veiculos,placa'
            ],
            'chassi' => [
                'required',
                'string',
                'size:17',
                $id ? 'unique:veiculos,chassi,' . $id : 'unique:veiculos,chassi'
            ],
            'renavam' => [
                'required',
                'string',
                'size:11',
                $id ? 'unique:veiculos,renavam,' . $id : 'unique:veiculos,renavam'
            ],
            'modelo' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'ano' => 'required|integer|min:1900|max:' . date('Y'),
        ];

        $messages = [
            'placa.required' => 'O campo placa é obrigatório.',
            'placa.size' => 'A placa deve ter exatamente 7 caracteres.',
            'chassi.required' => 'O campo chassi é obrigatório.',
            'chassi.size' => 'O chassi deve ter exatamente 17 caracteres.',
            'renavam.required' => 'O campo renavam é obrigatório.',
            'renavam.size' => 'O renavam deve ter exatamente 11 caracteres.',
            'modelo.required' => 'O campo modelo é obrigatório.',
            'marca.required' => 'O campo marca é obrigatório.',
            'ano.required' => 'O campo ano é obrigatório.',
            'ano.integer' => 'O ano deve ser um número inteiro.',
            'ano.min' => 'O ano não pode ser anterior a 1900.',
            'ano.max' => 'O ano não pode ser maior que o ano atual.',
            'placa.unique' => 'A placa já está registrada.',
            'chassi.unique' => 'O chassi já está registrado.',
            'renavam.unique' => 'O renavam já está registrado.',
        ];

        $validator = \Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            throw new \Illuminate\Validation\ValidationException($validator);
        }

        return $validator->validated();
    }
}

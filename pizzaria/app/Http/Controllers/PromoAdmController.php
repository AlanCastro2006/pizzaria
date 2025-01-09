<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use App\Models\Promocao;
use Illuminate\Http\Request;

class PromoAdmController extends Controller
{
    /**
     * Exibe a lista de promoções.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $promocoes = Promocao::all();
        // Recupera todos os produtos (ou pizzas) cadastrados
        $pizzas = Pizza::all(); 
        return view('pizzaria_admin.promocoes', compact('promocoes', 'pizzas'));
    }

    /**
     * Salva uma nova promoção.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'value' => 'required|numeric|min:0',
            'products' => 'required|array',
            'products.*' => 'exists:pizzas,id', // Substitua pizzas pelo nome correto da tabela
            'days' => 'required|array',
        ]);

        Promocao::create([
            'value' => $validatedData['value'],
            'products' => $validatedData['products'], // Aqui você vai salvar o array de IDs dos produtos
            'days' => $validatedData['days'],
        ]);
        
    // Recupera as promoções e pizzas para a view
    $promocoes = Promocao::all();
    $pizzas = Pizza::all();

    // Retorna a view com as promoções atualizadas
    return view('pizzaria_admin.promocoes', compact('promocoes', 'pizzas'))->with('success', 'Promoção criada com sucesso!');
}



    /**
     * Atualiza uma promoção existente.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Promocao  $promocao
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'value' => 'required|numeric|min:0',
            'products' => 'required|array',
            'products.*' => 'exists:pizzas,id', 
            'days' => 'required|array',
        ]);

        $promocao = Promocao::findOrFail($id);
        $promocao->update([
            'value' => $validatedData['value'],
            'products' => $validatedData['products'], // Atualiza os produtos
            'days' => $validatedData['days'],
        ]);
    // Recupera as promoções e pizzas para a view
    $promocoes = Promocao::all();
    $pizzas = Pizza::all();

    // Retorna a view com as promoções atualizadas
    return view('pizzaria_admin.promocoes', compact('promocoes', 'pizzas'))->with('success', 'Promoção atualizada com sucesso!');
}

    /**
     * Exclui uma promoção.
     *
     * @param  \App\Models\Promocao  $promocao
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $promocao = Promocao::findOrFail($id);
        $promocao->delete();
    // Recupera as promoções e pizzas para a view
    $promocoes = Promocao::all();
    $pizzas = Pizza::all();

    // Retorna a view com as promoções atualizadas
    return view('pizzaria_admin.promocoes', compact('promocoes', 'pizzas'))->with('success', 'Promoção excluída com sucesso!');
}


}

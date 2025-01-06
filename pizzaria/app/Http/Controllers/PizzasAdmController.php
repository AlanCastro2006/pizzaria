<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pizza;

class PizzasAdmController extends Controller
{
    // Exibir a lista de pizzas
    public function index()
    {
        $pizzas = Pizza::all(); // Obtém todas as pizzas do banco
        return view('pizzaria_admin.pizzas_adm.pizzas', compact('pizzas'));
    }


    public function store(Request $request)
    {
        // Validação dos dados
        $validatedData = $request->validate([
            'nome_pizza' => 'required|string|max:255',
            'ingredientes' => 'required|string', // Campo de ingredientes como texto
            'preco_pizza' => 'required|numeric|min:0',
            'imagem_pizza' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validação para a imagem
        ]);
    
        // Criando a pizza
        $pizza = new Pizza();
        $pizza->nome_pizza = $validatedData['nome_pizza'];
        $pizza->preco_pizza = $validatedData['preco_pizza'];
    
        // Processar os ingredientes
        $ingredientesArray = array_map('trim', explode(',', $validatedData['ingredientes']));
        $pizza->ingredientes = json_encode($ingredientesArray);
    
        // Salvando a imagem, se fornecida
        if ($request->hasFile('imagem_pizza')) {
            $imagem = $request->file('imagem_pizza');
    
            // Gerar um nome único para a imagem
            $imageName = time() . '.' . $imagem->getClientOriginalExtension();
    
            // Mover a imagem para a pasta public/img/pizzas
            $imagem->move(public_path('img/pizzas'), $imageName);
    
            // Salvar o caminho da imagem no banco de dados
            $pizza->imagem_pizza = 'img/pizzas/' . $imageName;
        }
    
        // Salvar os dados no banco
        $pizza->save();
    
        return redirect()->route('pizzas_adm.index')->with('success', 'Pizza adicionada com sucesso!');
    }
    
    

// Atualizar uma pizza existente
public function update(Request $request, $id)
{
    // Validação dos dados
    $validatedData = $request->validate([
        'nome_pizza' => 'required|string|max:255',
        'ingredientes' => 'required|string', // Campo de ingredientes como texto
        'preco_pizza' => 'required|numeric|min:0',
        'imagem_pizza' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validação para a imagem
    ]);

    // Encontrar a pizza pelo ID
    $pizza = Pizza::findOrFail($id);
    $pizza->nome_pizza = $validatedData['nome_pizza'];
    $pizza->preco_pizza = $validatedData['preco_pizza'];

    // Atualizar os ingredientes (separar os ingredientes por vírgulas)
    $ingredientesArray = array_map('trim', explode(',', $validatedData['ingredientes']));
    $pizza->ingredientes = json_encode($ingredientesArray);

    // Atualizar a imagem, se fornecida
    if ($request->hasFile('imagem_pizza')) {
        $imagem = $request->file('imagem_pizza');

        // Gerar um nome único para a imagem
        $imageName = time() . '.' . $imagem->getClientOriginalExtension();

        // Mover a imagem para a pasta public/img/pizzas
        $imagem->move(public_path('img/pizzas'), $imageName);

        // Remover a imagem antiga, se existir
        if ($pizza->imagem_pizza && file_exists(public_path($pizza->imagem_pizza))) {
            unlink(public_path($pizza->imagem_pizza));
        }

        // Salvar o caminho da nova imagem no banco de dados
        $pizza->imagem_pizza = 'img/pizzas/' . $imageName;
    }

    // Salvar as alterações no banco de dados
    $pizza->save();

    return redirect()->route('pizzas_adm.index')->with('success', 'Pizza atualizada com sucesso!');
}



    public function destroy($id)
    {
        // Encontra a pizza pelo ID
        $pizza = Pizza::findOrFail($id);
    
        // Remove a imagem associada, se existir
        if ($pizza->imagem_pizza && file_exists(public_path($pizza->imagem_pizza))) {
            unlink(public_path($pizza->imagem_pizza));  // Deleta a imagem do arquivo
        }
    
        // Exclui a pizza do banco de dados
        $pizza->delete();
    
        return redirect()->route('pizzas_adm.index')->with('success', 'Pizza removida com sucesso!');
    }
    
    
    
    
    
    
}

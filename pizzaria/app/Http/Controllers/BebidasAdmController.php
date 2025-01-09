<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Bebida;

class BebidasAdmController extends Controller
{
    //INDEX: Exibe a lista de bebidas
    public function index()
    {
        $bebidas = Bebida::all();
        return view('pizzaria_admin.bebidas', compact('bebidas'));
    }//Fim do Index

    //STORE: Armazena uma nova bebida
    public function store(Request $request)
    {
        $request->validate([
            'nome_bebida' => 'required|string|max:255',
            'preco_bebida' => 'required|numeric|min:0',
            'imagem_bebida' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $path = null;

        // Armazena a imagem, se enviada
        if ($request->hasFile('imagem_bebida')) {
            // Define o nome do arquivo
            $image = $request->file('imagem_bebida');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();

            // Move a imagem para a pasta public/img/bebidas
            $image->move(public_path('img/bebidas'), $imageName);

            // O caminho relativo que será armazenado no banco de dados
            $path = 'img/bebidas/' . $imageName;
        }
        Bebida::create([
            'nome_bebida' => $request->nome_bebida,
            'preco_bebida' => $request->preco_bebida,
            'imagem_bebida' => $path,
        ]);

        return redirect('/admin/bebidas')->with('success', 'Bebida adicionada com sucesso!');
    }//Fim do Store

    //UPDATE: Atualiza os dados de uma bebida existente.
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome_bebida' => 'required|string|max:255',
            'preco_bebida' => 'required|numeric|min:0',
            'imagem_bebida' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Encontra a bebida
        $bebida = Bebida::findOrFail($id);
        $path = $bebida->imagem_bebida;  // Caminho da imagem atual

        // Se uma nova imagem foi enviada, substitui a imagem antiga
        if ($request->hasFile('imagem_bebida')) {
            // Remove a imagem antiga, se existir
            if ($path && file_exists(public_path($path))) {
                unlink(public_path($path));  // Deleta a imagem antiga
            }

            // Define o nome do arquivo da nova imagem
            $image = $request->file('imagem_bebida');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();

            // Move a nova imagem para a pasta public/img/bebidas
            $image->move(public_path('img/bebidas'), $imageName);

            // O caminho da nova imagem a ser armazenado no banco de dados
            $path = 'img/bebidas/' . $imageName;
        }

        // Atualiza os dados da bebida
        $bebida->update([
            'nome_bebida' => $request->nome_bebida,
            'preco_bebida' => $request->preco_bebida,
            'imagem_bebida' => $path,
        ]);

        return redirect('/admin/bebidas')->with('success', 'Bebida adicionada com sucesso!');
    }

    //DESTROY: Remove uma bebida
    public function destroy($id)
    {
        $bebida = Bebida::findOrFail($id);

        // Remove a imagem associada, se existir
        if ($bebida->imagem_bebida && file_exists(public_path($bebida->imagem_bebida))) {
            unlink(public_path($bebida->imagem_bebida));  // Deleta a imagem do arquivo
        }

        // Exclui a bebida do banco de dados
        $bebida->delete();

        return redirect('/admin/bebidas')->with('success', 'Bebida adicionada com sucesso!');
    }//Fim do Destroy
}

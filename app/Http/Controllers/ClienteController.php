<?php

namespace App\Http\Controllers;

use App\Models\Cliente;


class ClienteController extends Controller
{
    // Função que retorna a tela de cadastro de um novo cliente.
    public function create()
    {
        return view('usuario.cadastroUsuario');
    }

    // Função que realiza o cadastro de um novo cliente.
    public function store()
    {
        $clientes = [
            'cliente_ID' => request('cliente_ID'),
            'nome' => request('nome'),
            'cpf' => request('cpf'),
            'email' => request('email'),
            'telefone' => request('telefone'),
            'endereco' => request('endereco'),
        ];
        Cliente::create($clientes);
        return redirect('/inicio');
    }

    // Função que realiza uma busca por todos os clientes podendo pesquisar pelo CPF ou Nome.
    public function show()
    { {
            $pesquisar = request('pesquisar');
            if ($pesquisar) {
                $buscarcpf = Cliente::where([[

                    'cpf',
                    'like',
                    '%' . $pesquisar . '%'

                ]])
                    ->orWhere([['nome', 'like', '%' . $pesquisar . '%']])
                    ->get();
            } else {

                $buscarcpf = Cliente::paginate(10);
            }
            return view('usuario.inicio')->with('buscarcpf', $buscarcpf, 'pesquisar', $pesquisar);
        }
    }

    // Função que busca um cliente pelo id e retorna seus dados.
    public function edit($id)
    {
        $clientes = Cliente::findOrFail($id);
        return view('usuario.editarUsuario')->with('clientes', $clientes);
    }

    // Função que realiza alterações do cliente selecionado.
    public function update($id)
    {
        $clientes = Cliente::findOrFail($id);
        $clientes->update([
            'nome' => request('nome'),
            'cpf' => request('cpf'),
            'email' => request('email'),
            'telefone' => request('telefone'),
            'endereco' => request('endereco'),
        ]);
        return redirect('/inicio');
    }

    // Função que realiza a exclusão de um cliente.
    public function destroy($id)
    {
        $deletarCliente = Cliente::findOrFail($id);
        $deletarCliente->delete();
        return redirect('/inicio');
    }
}

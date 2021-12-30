<?php

namespace App\Http\Controllers;

use App\Models\Cliente;


class ClienteController extends Controller
{
    public function create()
    {
        return view('usuario.cadastroUsuario');
    }

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

    public function edit($id)
    {
        $clientes = Cliente::findOrFail($id);
        return view('usuario.editarUsuario')->with('clientes', $clientes);
    }

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

    public function destroy($id)
    {
        $deletarCliente = Cliente::findOrFail($id);
        $deletarCliente->delete();
        return redirect('/inicio');
    }
}

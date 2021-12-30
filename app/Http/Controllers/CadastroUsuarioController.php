<?php

namespace App\Http\Controllers;

use App\Models\CadastroClientes;
use Illuminate\Http\Request;


class CadastroUsuarioController extends Controller
{


    public function create()
    {
        return view('usuario.cadastro_usuario');
    }


    public function store(Request $request)
    {
        $clientes = [
            'cliente_ID' => request('cliente_ID'),
            'nome' => request('nome'),
            'cpf' => request('cpf'),
            'email' => request('email'),
            'telefone' => request('telefone'),
            'endereco' => request('endereco'),

        ];
        CadastroClientes::create($clientes);
        return redirect('/inicio');
    }

    public function show()
    { {
            $pesquisar = request('pesquisar');
            if ($pesquisar) {
                $buscarcpf = CadastroClientes::where([[

                    'cpf',
                    'like',
                    '%' . $pesquisar . '%'

                ]])
                    ->orWhere([['nome', 'like', '%' . $pesquisar . '%']])
                    ->get();
            } else {

                $buscarcpf = CadastroClientes::all();
            }
            return view('usuario.inicio')->with('buscarcpf', $buscarcpf, 'pesquisar', $pesquisar);
        }
    }



    public function destroy(Request $request, $id)
    {
        $deletarcliente = CadastroClientes::findOrFail($id);
        $deletarcliente->delete();
        return redirect('/inicio');
    }
}

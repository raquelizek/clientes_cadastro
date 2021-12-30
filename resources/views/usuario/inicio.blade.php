@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">{{ __('Lista de Clientes') }}
                    <form action="/inicio" method="get">
                        <div class="input-group input-group-alternative input-group-merge">

                            <div class="p-2">
                                <a href="/cadastro-usuario" button type="button" class="btn btn-primary ">Cadastrar Novo Usuário</a>
                            </div>
                            <div class="p-2">
                                <input class="form-control mr-sm-3" name="pesquisar" placeholder="Pesquisar" type="text">
                            </div>

                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <table class=" table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">CPF</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Telefone</th>
                                <th scope="col">Endereço</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($buscarcpf as $row)
                            <tr>
                                <td>{{@$row->nome}}</td>
                                <td>{{@$row->cpf}}</td>
                                <td>{{@$row->email}}</td>
                                <td>{{@$row->telefone}}</td>
                                <td>{{@$row->endereco}}</td>
                                <td>
                                    <a href="/cadastro-usuario/{{$row->cliente_ID}}/edit" button type="button" class="btn btn-success">Editar</a>
                                </td>
                                <td>
                                    <form action="/usuarios-deletados/{{ $row->cliente_ID }}" method="delete">
                                        {{csrf_field()}}
                                        <button type="submit" class="btn btn-danger">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="pagination justify-content-center">
        {{$buscarcpf->links("pagination::bootstrap-4")}}
    </div>
</div>

@endsection
@extends('layouts.app1')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">{{ __('Formulário de Informações') }}
                </div>
                <div class="card-body">
                    <form action="/cadastro-usuario/{{@$clientes->cliente_ID}}/update" method="post">
                        @csrf
                        @method('PUT')
                        <div class="d-flex flex-row-reverse">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="form-control-label" for="input-name">Nome</label>
                                        <input type="text" name="nome" id="nome" value="{{@$clientes->nome}}" class="form-control form-control-alternative">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="form-control-label" for="input-name">CPF</label>
                                        <input type="text" name="cpf" id="cpf" value="{{@$clientes->cpf}}" class="form-control form-control-alternative">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="form-control-label" for="input-name">E-mail</label>
                                        <input type="text" name="email" id="email" value="{{@$clientes->email}}" class="form-control form-control-alternative">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="form-control-label" for="input-name">Telefone</label>
                                        <input type="text" name="telefone" id="telefone" value="{{@$clientes->telefone}}" class="form-control form-control-alternative">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group ">
                                        <label class="form-control-label" for="input-name">Endereço</label>
                                        <input type="text" name="endereco" id="endereco" value="{{@$clientes->endereco}}" class="form-control form-control-alternative">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
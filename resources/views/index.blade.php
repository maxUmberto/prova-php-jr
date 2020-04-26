@extends('templates/template')

@section('content')
    <div class="container-fluid">
        <h1 class="text-center mt-3">Lista de usuários</h1>
        <hr>

        <!-- Filter form -->
        <div class="row mb-2">
            <div class="offset-md-2 offset-xs-0 offset-sm-0"></div>
            <div class="col-md-8 col-xs-12">
                <div class="row">
                    <div class="col-md-9 col-sm-12 col-xs-12">
                        <form method="get" action="{{url('/users/search')}}" class="">
                            <div class="form-row">
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <input type="text" name="name" class="form-control mb-2 mr-sm-2" placeholder="Filtrar por nome">
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <input type="text" name="cpf" class="form-control mb-2 mr-sm-2" placeholder="Filtrar por CPF">
                                </div>
                                <div class="col-md-4 col-xs-12 text-center" style="display: inline">
                                    <button type="submit" class="btn btn-outline-info mb-2"><i class="fas fa-filter"></i> Filtrar</button>
                                    <a href="{{ url('users/') }}">
                                        <button type="submit" class="btn btn-outline-info mb-2"><i class="fas fa-eraser"></i> Limpar</button>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div> <!-- End Col-9 -->
                    <div class="col-md-3 col-xs-12 text-center">
                        <a href="{{ url('users/create') }}" class="btn btn-outline-success"><i class="fas fa-plus"></i> Cadastrar Novo</a>
                    </div>
                </div> <!-- End Row -->
            </div><!-- End col-8 -->
        </div><!-- Enf Row -->

        <!-- Cards with users informations -->
        @foreach($users as $user)
            @php
                //Get roles to the current user
                $roles = $user->find($user->id)->relRole;
            @endphp
            <div class="row mb-2">
            <div class="offset-xs-1 offset-md-2 offset-sm-1 "></div>
            <div class="col-xs-10 col-md-8 col-sm-10 card  ">
                <div class="card-body">
                    <span class="card-title h4">{{$user->name}}</span>
                    <!-- In case the current user dont have any role -->
                    @if(count($roles)!= 0)
                        @if($roles[0]->client) <smal class="text-muted">(Cliente)</smal> @endif
                        @if($roles[0]->employee) <smal class="text-muted">(Funcionário)</smal> @endif
                        @if($roles[0]->admin) <smal class="text-muted">(Administrador)</smal> @endif
                    @endif
                    <div class="row mt-2">
                        <div class="col">
                            <span class="font-weight-bold">CPF:</span> {{$user->cpf}}
                        </div>
                        <div class="col">
                            <span class="font-weight-bold">Nascimento:</span> {{ date('d/m/Y', strtotime($user->birthday)) }}
                        </div>
                        <div class="col">
                            <span class="font-weight-bold">Telefone:</span> {{$user->phone}}
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col">
                            <span class="font-weight-bold">Endereço:</span> {{$user->address}} - {{$user->city}} / {{$user->uf}}
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="float-right">
                        @csrf
                        <a href="{{url("users/$user->id/edit")}}" class="btn btn-outline-primary" title="Editar"><i class="fas fa-edit"></i></a>
                        <button class="btn btn-outline-danger" title="Excluir" data-toggle="modal" data-target="#modal{{$user->id}}"><i class="fas fa-trash"></i></button>

                        <!-- Modal -->
                        <div class="modal fade" id="modal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Excluir usuário</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>{{$user->name}}</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-info" data-dismiss="modal"><i class="fas fa-arrow-left"></i> Voltar</button>
                                        <a href="{{url("/users/$user->id")}}" class="btn btn-danger" id="del-button"><i class="fas fa-trash-alt"></i> Excluir</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Card Body -->
            </div><!-- End Card | End col-8 -->
        </div><!-- End Row -->
        @endforeach

    </div>
@endsection

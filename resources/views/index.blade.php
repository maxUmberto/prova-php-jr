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
                    <div class="col-md-8 col-xs-12">
                        <form class="">
                            <div class="form-row">
                                <div class="col-xs-12">
                                    <input type="text" name="name" class="form-control mb-2 mr-sm-2" placeholder="Filtrar por nome">
                                </div>
                                <div class="col-xs-12">
                                    <input type="text" name="cpf" class="form-control mb-2 mr-sm-2" placeholder="Filtrar por nome">
                                </div>
                                <div class="col-xs-12 text-center">
                                    <button type="submit" class="btn btn-outline-info mb-2"><i class="fas fa-filter"></i> Filtrar</button>
                                </div>
                            </div>
                        </form>
                    </div> <!-- End Col-9 -->
                    <div class="col-md-3 col-xs-12">
                        <a href="{{ url('/new') }}" class="btn btn-outline-success"><i class="fas fa-plus"></i> Cadastrar Novo</a>
                    </div>
                </div> <!-- End Row -->
            </div><!-- End col-8 -->
        </div><!-- Enf Row -->

        <!-- Cards with users informations -->
        <div class="row mb-2">
            <div class="offset-2"></div>
            <div class="card col-8">
                <div class="card-body">
                    <span class="card-title h4">Max Umberto Santos</span> <smal class="text-muted">(Administrador)</smal>
                    <div class="row mt-2">
                        <div class="col">
                            <bold>CPF:</bold> 09441254681
                        </div>
                        <div class="col">
                            <bold>Nascimento:</bold> 03/07/1997
                        </div>
                        <div class="col">
                            <bold>Telefone:</bold>(21)973052963
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col">
                            <bold>Endereço:</bold> Rua Itaboraí, n18 - Seropédica/RJ
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="float-right">
                        <a href="#" class="btn btn-outline-primary" title="Editar"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-outline-danger" title="Excluir" data-toggle="modal" data-target="#modal1"><i class="fas fa-trash"></i></a>

                        <!-- Modal -->
                        <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Excluir usuário</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Excluir Max Umberto Santos</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-info" data-dismiss="modal"><i class="fas fa-arrow-left"></i> Voltar</button>
                                        <button type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Excluir</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Card Body -->
            </div><!-- End Card | End col-8 -->
        </div><!-- End Row -->
        <div class="row mb-2">
            <div class="offset-2"></div>
            <div class="card col-8">
                <div class="card-body">
                    <span class="card-title h4">Max Umberto Santos</span> <smal class="text-muted">(Administrador)</smal>
                    <div class="row mt-2">
                        <div class="col">
                            <bold>CPF:</bold> 09441254681
                        </div>
                        <div class="col">
                            <bold>Nascimento:</bold> 03/07/1997
                        </div>
                        <div class="col">
                            <bold>Telefone:</bold>(21)973052963
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col">
                            <bold>Endereço:</bold> Rua Itaboraí, n18 - Seropédica/RJ
                        </div>
                    </div>
                    <div class="float-right">
                        <a href="#" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-outline-danger"><i class="fas fa-trash"></i></a>
                    </div>
                </div><!-- End Card Body -->
            </div><!-- End Card | End col-8 -->
        </div><!-- End Row -->
        <div class="row mb-2">
            <div class="offset-2"></div>
            <div class="card col-8">
                <div class="card-body">
                    <span class="card-title h4">Max Umberto Santos</span> <smal class="text-muted">(Administrador)</smal>
                    <div class="row mt-2">
                        <div class="col">
                            <bold>CPF:</bold> 09441254681
                        </div>
                        <div class="col">
                            <bold>Nascimento:</bold> 03/07/1997
                        </div>
                        <div class="col">
                            <bold>Telefone:</bold>(21)973052963
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col">
                            <bold>Endereço:</bold> Rua Itaboraí, n18 - Seropédica/RJ
                        </div>
                    </div>
                    <div class="float-right">
                        <a href="#" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-outline-danger"><i class="fas fa-trash"></i></a>
                    </div>
                </div><!-- End Card Body -->
            </div><!-- End Card | End col-8 -->
        </div><!-- End Row -->
        <div class="row mb-2">
            <div class="offset-2"></div>
            <div class="card col-8">
                <div class="card-body">
                    <span class="card-title h4">Max Umberto Santos</span> <smal class="text-muted">(Administrador)</smal>
                    <div class="row mt-2">
                        <div class="col">
                            <bold>CPF:</bold> 09441254681
                        </div>
                        <div class="col">
                            <bold>Nascimento:</bold> 03/07/1997
                        </div>
                        <div class="col">
                            <bold>Telefone:</bold>(21)973052963
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col">
                            <bold>Endereço:</bold> Rua Itaboraí, n18 - Seropédica/RJ
                        </div>
                    </div>
                    <div class="float-right">
                        <a href="#" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-outline-danger"><i class="fas fa-trash"></i></a>
                    </div>
                </div><!-- End Card Body -->
            </div><!-- End Card | End col-8 -->
        </div><!-- End Row -->
        <div class="row mb-2">
            <div class="offset-2"></div>
            <div class="card col-8">
                <div class="card-body">
                    <span class="card-title h4">Max Umberto Santos</span> <smal class="text-muted">(Administrador)</smal>
                    <div class="row mt-2">
                        <div class="col">
                            <bold>CPF:</bold> 09441254681
                        </div>
                        <div class="col">
                            <bold>Nascimento:</bold> 03/07/1997
                        </div>
                        <div class="col">
                            <bold>Telefone:</bold>(21)973052963
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col">
                            <bold>Endereço:</bold> Rua Itaboraí, n18 - Seropédica/RJ
                        </div>
                    </div>
                    <div class="float-right">
                        <a href="#" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-outline-danger"><i class="fas fa-trash"></i></a>
                    </div>
                </div><!-- End Card Body -->
            </div><!-- End Card | End col-8 -->
        </div><!-- End Row -->
        <div class="row mb-2">
            <div class="offset-2"></div>
            <div class="card col-8">
                <div class="card-body">
                    <span class="card-title h4">Max Umberto Santos</span> <smal class="text-muted">(Administrador)</smal>
                    <div class="row mt-2">
                        <div class="col">
                            <bold>CPF:</bold> 09441254681
                        </div>
                        <div class="col">
                            <bold>Nascimento:</bold> 03/07/1997
                        </div>
                        <div class="col">
                            <bold>Telefone:</bold>(21)973052963
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col">
                            <bold>Endereço:</bold> Rua Itaboraí, n18 - Seropédica/RJ
                        </div>
                    </div>
                    <div class="float-right">
                        <a href="#" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-outline-danger"><i class="fas fa-trash"></i></a>
                    </div>
                </div><!-- End Card Body -->
            </div><!-- End Card | End col-8 -->
        </div><!-- End Row -->
        <div class="row mb-2">
            <div class="offset-2"></div>
            <div class="card col-8">
                <div class="card-body">
                    <span class="card-title h4">Max Umberto Santos</span> <smal class="text-muted">(Administrador)</smal>
                    <div class="row mt-2">
                        <div class="col">
                            <bold>CPF:</bold> 09441254681
                        </div>
                        <div class="col">
                            <bold>Nascimento:</bold> 03/07/1997
                        </div>
                        <div class="col">
                            <bold>Telefone:</bold>(21)973052963
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col">
                            <bold>Endereço:</bold> Rua Itaboraí, n18 - Seropédica/RJ
                        </div>
                    </div>
                    <div class="float-right">
                        <a href="#" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-outline-danger"><i class="fas fa-trash"></i></a>
                    </div>
                </div><!-- End Card Body -->
            </div><!-- End Card | End col-8 -->
        </div><!-- End Row -->

    </div>
@endsection
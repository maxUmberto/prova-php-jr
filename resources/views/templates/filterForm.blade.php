<div class="row mb-2">
    <div class="offset-md-2 offset-xs-0 offset-sm-0"></div>
    <div class="col-md-8 col-xs-12">
        <div class="row">
            <div class="col-md-9 col-sm-12 col-xs-12">
                <form method="get" action="{{url('/users/search')}}" class="">
                    <div class="form-row">
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <input type="text"
                                   name="name"
                                   class="form-control mb-2 mr-sm-2"
                                   placeholder="Filtrar por nome">
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <input type="text"
                                   name="cpf"
                                   class="form-control mb-2 mr-sm-2"
                                   placeholder="Filtrar por CPF">
                        </div>
                        <div class="col-md-4 col-xs-12 text-center" style="display: inline">
                            <button type="submit" class="btn btn-outline-info mb-2">
                                <i class="fas fa-filter"></i> Filtrar
                            </button>
                            <a href="{{ url('users/') }}">
                                <button type="submit" class="btn btn-outline-info mb-2">
                                    <i class="fas fa-eraser"></i> Limpar
                                </button>
                            </a>
                        </div>
                    </div>
                </form>
            </div> <!-- End Col-9 -->
            <div class="col-md-3 col-xs-12 text-center">
                <a href="{{ url('users/create') }}" class="btn btn-outline-success"><i class="fas fa-plus"></i> Cadastrar Novo</a>
            </div>
        </div> <!-- End Row -->
    </div><!-- End col-md-8 -->
</div><!-- Enf Row -->

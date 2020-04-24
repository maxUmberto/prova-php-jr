@extends('templates/template')

@section('content')
    <div class="container-fluid">
        <h1 class="text-center mt-3">Novo Usuário</h1>
        <hr>

        <div class="row">
            <div class="offset-xs-0 offset-md-2"></div>
            <div class="col-xs-12 col-md-8 mb-3">
                <form>

                    <!-- First line -> Name and CPF -->
                    <div class="form-row">
                        <div class="form-group col-md-6 col-xs-12">
                            <label for="name">Nome</label>
                            <input type="text" name="email" class="form-control" id="name">
                        </div>
                        <div class="form-group col-md-6 col-xs-12">
                            <label for="cpf">CPF</label>
                            <input type="text" name="cpf" class="form-control" id="cpf">
                        </div>
                    </div>

                    <!-- Second Line -> Birthday and Phone -->
                    <div class="form-row">
                        <div class="form-group col-xs-12 col-md-6">
                            <label for="name">Aniversário</label>
                            <div class="row">
                                <div class="col-md-3 col-xs-3">
                                    <select class="custom-select" name="day">
                                        <option selected>Dia</option>
                                        @for($i = 1; $i<32; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-6 col-xs-6">
                                    <select class="custom-select" name="month">
                                        <option selected>Mês</option>
                                        <option value="1">Janeiro</option>
                                        <option value="2">Fevereiro</option>
                                        <option value="3">Março</option>
                                        <option value="4">Abril</option>
                                        <option value="5">Maio</option>
                                        <option value="6">Junho</option>
                                        <option value="7">Julho</option>
                                        <option value="8">Agosto</option>
                                        <option value="9">Setembro</option>
                                        <option value="10">Outubro</option>
                                        <option value="11">Novembro</option>
                                        <option value="12">Dezembro</option>
                                    </select>
                                </div>
                                <div class="col-md-3 col-xs-3">
                                    <select class="custom-select" name="year">
                                        <option selected>Ano</option>
                                        @for($i = date('Y'); $i>1900; $i--)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-xs-12">
                            <label for="phone">Telefone</label>
                            <input type="tel" name="phone" class="form-control" id="phone">
                        </div>
                    </div>

                    <!-- Third Line -> Address -->
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="address">Endereço</label>
                            <input type="text" name="address" class="form-control" id="address">
                        </div>
                    </div>

                    <!--Fourth Line -> Addres Infos -->
                    <div class="form-row">
                        <div class="form-group col-md-2 col-xs-4">
                            <label for="address_number">Nº</label>
                            <input type="text" name="address_number" class="form-control" id="address_number">
                        </div>
                        <div class="form-group col-md-4 col-xs-8">
                            <label for="address_uf">Endereço</label>
                            <select class="custom-select" name="address_uf" id="address_uf">
                                <option value="AC">Acre</option>
                                <option value="AL">Alagoas</option>
                                <option value="AP">Amapá</option>
                                <option value="AM">Amazonas</option>
                                <option value="BA">Bahia</option>
                                <option value="CE">Ceará</option>
                                <option value="DF">Distrito Federal</option>
                                <option value="ES">Espírito Santo</option>
                                <option value="GO">Goiás</option>
                                <option value="MA">Maranhão</option>
                                <option value="MT">Mato Grosso</option>
                                <option value="MS">Mato Grosso do Sul</option>
                                <option value="MG">Minas Gerais</option>
                                <option value="PA">Pará</option>
                                <option value="PB">Paraíba</option>
                                <option value="PR">Paraná</option>
                                <option value="PE">Pernambuco</option>
                                <option value="PI">Piauí</option>
                                <option value="RJ">Rio de Janeiro</option>
                                <option value="RN">Rio Grande do Norte</option>
                                <option value="RS">Rio Grande do Sul</option>
                                <option value="RO">Rondônia</option>
                                <option value="RR">Roraima</option>
                                <option value="SC">Santa Catarina</option>
                                <option value="SP">São Paulo</option>
                                <option value="SE">Sergipe</option>
                                <option value="TO">Tocantins</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6 col-xs-12">
                            <label for="address_city">Cidade</label>
                            <input type="text" name="address_city" class="form-control" id="address_city">
                        </div>
                    </div>

                    <!--Fifth Line -> Roles and Submit Button -->
                    <div class="form-row mb-3">
                        <div class="form-group col-md-6 col-xs-12">
                            <label for="role">Roles: </label>
                            <select name="role" id="role" class="custom-select" multiple>
                                <option value="1">Funcionário</option>
                                <option value="2">Cliente</option>
                                <option value="3">Administrador</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6 col-xs-12 text-center mt-5">
                            <button type="submit" class="btn btn-lg btn-outline-success text-center"><i class="fas fa-plus"></i> Cadastrar</button>
                        </div>
                    </div>
                </form>
            </div><!-- End col-md-8 -->
        </div><!-- End Row -->
    </div><!-- End Container -->
@endsection

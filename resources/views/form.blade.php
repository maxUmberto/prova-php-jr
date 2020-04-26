@extends('templates/template')

@section('content')
    <div class="container-fluid">
        @if(isset($user))
            <h1 class="text-center mt-3">Editar Usuário</h1>
        @else
            <h1 class="text-center mt-3">Novo Usuário</h1>
        @endif
        <hr>

        <div class="row">
            <div class="offset-xs-0 offset-md-2"></div>
            <div class="col-xs-12 col-md-8 mb-3">
                @if(isset($user))
                    <form method="post" action="{{url("/users/$user->id")}}">
                        @method('PUT')
                @else
                    <form method="post" action="{{url('/users')}}">
                @endif
                    @csrf

                    <!-- First line -> Name and CPF -->
                    <div class="form-row">
                        <div class="form-group col-md-6 col-xs-12">
                            <label for="name">Nome</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ $user->name ?? '' }}">
                        </div>
                        <div class="form-group col-md-6 col-xs-12">
                            <label for="cpf">CPF</label>
                            <input type="text" name="cpf" class="form-control" id="cpf" value="{{ $user->cpf ?? '' }}">
                        </div>
                    </div>

                    <!-- Second Line -> Birthday and Phone -->
                    <div class="form-row">
                        <div class="form-group col-xs-12 col-md-6">
                            <label for="name">Aniversário</label>
                            @php if(isset($user))$birthday = explode('-', $user['birthday']); @endphp
                            <div class="row">
                                <div class="col-md-3 col-xs-3">
                                    <select class="custom-select" name="day">
                                        <option selected>Dia</option>
                                        @for($i = 1; $i<32; $i++)
                                            <option value="{{ $i }}" {{ (isset($user) && $i == $birthday[2]) ? 'selected' : '' }}>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-6 col-xs-6">
                                    <select class="custom-select" name="month">
                                        <option selected>Mês</option>
                                        @php
                                            $months = [
                                                1 => 'Janeiro',
                                                2 => 'Fevereiro',
                                                3 => 'Março',
                                                4 => 'Abril',
                                                5 => 'Maio',
                                                6 => 'Junho',
                                                7 => 'Julho',
                                                8 => 'Agosto',
                                                9 => 'Setembro',
                                                10 => 'Outubro',
                                                11 => 'Novembro',
                                                12 => 'Dezembro',
                                            ]
                                        @endphp
                                        @foreach($months as $key => $month)
                                            <option value="{{ $key }}" {{ (isset($user) && $key == $birthday[1]) ? 'selected' : '' }}> {{ $month }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 col-xs-3">
                                    <select class="custom-select" name="year">
                                        <option selected>Ano</option>
                                        @for($i = date('Y'); $i>1900; $i--)
                                            <option value="{{ $i }}" {{ (isset($user) && $i == $birthday[0]) ? 'selected' : '' }}>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-xs-12">
                            <label for="phone">Telefone</label>
                            <input type="tel" name="phone" class="form-control" id="phone" value="{{ $user->phone ?? '' }}">
                        </div>
                    </div>

                    <!-- Third Line -> Address -->
                    @php if(isset($user))$address = explode(',', $user['address']); @endphp
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="address">Endereço</label>
                            <input type="text" name="address" class="form-control" id="address" value="{{ (isset($user)) ? $address[0] : '' }}">
                        </div>
                    </div>

                    <!--Fourth Line -> Addres Infos -->
                    <div class="form-row">
                        <div class="form-group col-md-2 col-xs-4">
                            <label for="address_number">Nº</label>
                            <input type="text" name="address_number" class="form-control" id="address_number" value="{{ (isset($user)) ? $address[1] : '' }}">
                        </div>
                        <div class="form-group col-md-4 col-xs-8">
                            @php
                                $estados = array(
                                    'AC'=>'Acre',
                                    'AL'=>'Alagoas',
                                    'AP'=>'Amapá',
                                    'AM'=>'Amazonas',
                                    'BA'=>'Bahia',
                                    'CE'=>'Ceará',
                                    'DF'=>'Distrito Federal',
                                    'ES'=>'Espírito Santo',
                                    'GO'=>'Goiás',
                                    'MA'=>'Maranhão',
                                    'MT'=>'Mato Grosso',
                                    'MS'=>'Mato Grosso do Sul',
                                    'MG'=>'Minas Gerais',
                                    'PA'=>'Pará',
                                    'PB'=>'Paraíba',
                                    'PR'=>'Paraná',
                                    'PE'=>'Pernambuco',
                                    'PI'=>'Piauí',
                                    'RJ'=>'Rio de Janeiro',
                                    'RN'=>'Rio Grande do Norte',
                                    'RS'=>'Rio Grande do Sul',
                                    'RO'=>'Rondônia',
                                    'RR'=>'Roraima',
                                    'SC'=>'Santa Catarina',
                                    'SP'=>'São Paulo',
                                    'SE'=>'Sergipe',
                                    'TO'=>'Tocantins'
                                );
                            @endphp
                            <label for="address_uf">Estado</label>
                            <select class="custom-select" name="address_uf" id="address_uf">
                                @foreach($estados as $sigla => $estado)
                                    <option value="{{ $sigla }}" {{ (isset($user) && $sigla == $user->uf) ? 'selected' : '' }}>{{$estado}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6 col-xs-12">
                            <label for="address_city">Cidade</label>
                            <input type="text" name="address_city" class="form-control" id="address_city" value="{{ $user->city ?? '' }}">
                        </div>
                    </div>

                    <!--Fifth Line -> Roles and Submit Button -->
                    <div class="form-row mb-3">
                        <div class="form-group col-md-6 col-xs-12">
                            <label for="role">Roles: </label>
                            <select name="roles[]" id="role" class="custom-select" multiple>
                                <option value="1" id="client" {{ (isset($roles[0]) && $roles[0]->client == 1) ? 'selected' : '' }}>Cliente</option>
                                <option value="2" id="func" {{ (isset($roles[0]) && $roles[0]->employee == 1) ? 'selected' : '' }}>Funcionário</option>
                                <option value="3" id="admin" {{ (isset($roles[0]) && $roles[0]->admin == 1) ? 'selected' : '' }}>Administrador</option>
                                <option value="0" id="no-role">Nenhum</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6 col-xs-12 text-center mt-5">
                            <a href="{{url('/users')}}" class="btn btn-lg btn-outline-info text-center"><i class="fas fa-arrow-left"></i> Voltar</a>
                            @if(isset($user))
                                <button type="submit" class="btn btn-lg btn-primary text-center"><i class="fas fa-edit"></i> Atualizar</button>
                            @else
                                <button type="submit" class="btn btn-lg btn-outline-success text-center"><i class="fas fa-plus"></i> Cadastrar</button>
                            @endif
                        </div>
                    </div>
                </form>
            </div><!-- End col-md-8 -->
        </div><!-- End Row -->
    </div><!-- End Container -->
@endsection

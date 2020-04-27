@extends('templates/template')

@section('content')
    <div class="container-fluid">
        <h1 class="text-center mt-3">Lista de usuários</h1>
        <hr>

        <!-- Filter form -->
        @include('templates.filterForm');

        @if(count($users) > 0)
            <!-- Cards with users informations -->
            @include('templates.cardUsers');
        @else
            <div class="row mb-2">
                <div class="offset-xs-1 offset-md-2 offset-sm-1 "></div>
                <div class="col-xs-10 col-md-8 col-sm-10 text-center">
                    <h1>Não existem resultados para serem exibidos</h1>
                </div>
            </div>
        @endif

    </div>
@endsection

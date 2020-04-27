@if(session()->has('success'))
    <div class="row mb-2">
        <div class="offset-xs-1 offset-md-2 offset-sm-1"></div>
        <div class="col-xs-10 col-md-8 col-sm-10 text-center mt-4 mb-4 p-2 alert-success">
            {{ session('success') }}
        </div>
    </div>
@endif
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
                    <a href="{{url("users/$user->id/edit")}}" class="btn btn-outline-primary" title="Editar">
                        <i class="fas fa-edit"></i>
                    </a>
                    <button class="btn btn-outline-danger" title="Excluir" data-toggle="modal" data-target="#modal{{$user->id}}">
                        <i class="fas fa-trash"></i>
                    </button>

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
                                    <button type="button" class="btn btn-outline-info" data-dismiss="modal">
                                        <i class="fas fa-arrow-left"></i> Voltar
                                    </button>
                                    <a href="{{url("/users/$user->id")}}" class="btn btn-danger" id="del-button">
                                        <i class="fas fa-trash-alt"></i> Excluir
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Modal Box -->
                </div><!-- End Action Buttons -->
            </div><!-- End Card Body -->
        </div><!-- End Card | End col-8 -->
    </div><!-- End Row -->
@endforeach

<div class="row mb-2">
    <div class="offset-xs-1 offset-md-2 offset-sm-1"></div>
    <div class="col-xs-10 col-md-8 col-sm-10 ">
        {{ $users->links() }}
    </div>
</div>

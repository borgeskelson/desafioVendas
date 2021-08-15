<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="{{ asset('/css/login.css') }}" rel="stylesheet">

<div class="container">
    @include('includes.messages')
    <div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3"> 
        <div class="panel panel-default" >
            <div class="panel-heading">
                <div class="panel-title text-center">Gestão de Vendas</div>
            </div>
            <div class="panel-body" >
                <form name="form" id="form" class="form-horizontal" action="{{ route('usuarios.login') }}" method="POST">
                    @csrf
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <select class="form-control selectpicker show-tick" data-live-search="true" name="id_usuario">
                        @foreach ($usuarios as $usuario)
                            <option data-subtext="{{ $usuario->nome }}" value="{{ $usuario->id }}">{{ $usuario->nome }} - {{ $usuario->email }}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <!-- Button -->
                        <div class="col-sm-12 controls">
                            <button type="submit" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-log-in"></i> Entrar</button>
                            <!--a href="/pedidos/{{ $usuario->id }}/finish" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-log-in"></i> Entrar</a-->
                        </div>
                    </div>
                </form>
            </div>
        </div>  
    </div>
</div>

<div id="particles"></div>

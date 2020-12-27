@extends("adminlte::page")

@section("title", "Usuarios")

@section("content_header")
    <h2>Usuarios <a href="{{route("users.create")}}" class="btn btn-success">New</a></h2>

@endsection

@section("content")
    <div class="card-body">
        <table class="table table-condensed">
            <thead>
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Acões</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th>{{$user->full_name}}</th>
                    <th>{{$user->cpf}}</th>
                    <th>{{$user->email}}</th>
                    <th>{{$user->phone}}</th>
                    <th>
                        <form action="{{route("users.destroy", $user->id)}}" method="POST">
                            <a href="{{route("users.index_permissions", $user->id)}}" class="btn btn-dark">Permissões</a>

                            @csrf
                            @method("DELETE")
                            <a href="{{route("address.create", $user->id)}}" class="btn btn-info">Endereço</a>
                            <button class="btn btn-danger"> Deletar</button>

                        </form>

                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

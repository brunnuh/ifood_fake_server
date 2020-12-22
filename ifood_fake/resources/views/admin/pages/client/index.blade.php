@extends("adminlte::page")

@section("title", "clientes")

@section("content_header")
    <h2>Clientes <a href="{{route("clients.create")}}" class="btn btn-success">New</a></h2>

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
                @foreach($clients as $client)
                    <tr>
                        <th>{{$client->full_name}}</th>
                        <th>{{$client->cpf}}</th>
                        <th>{{$client->email}}</th>
                        <th>{{$client->phone}}</th>
                        <th>
                            <form action="{{route("clients.destroy", $client->id)}}" method="POST">
                                @csrf
                                @method("DELETE")
                                <a href="{{route("address_client.create", $client->id)}}" class="btn btn-info">Endereço</a>
                                <button class="btn btn-danger"> Deletar</button>

                            </form>

                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

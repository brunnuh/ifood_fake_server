

@extends("adminlte::page")

@section("title", "Permissões")

@section("content_header")
    <h2>Permissões <a href="{{route("permissions.create")}}" class="btn btn-success">New</a></h2>

@endsection

@section("content")
    <div class="card-body">
        <table class="table table-condensed">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Acões</th>
            </tr>
            </thead>
            <tbody>
            @foreach($permissions as $permission)
                <tr>
                    <th style="margin-top: 80px">{{$permission->name}}</th>
                    <th>{{$permission->description}}</th>
                    <th>

                        <form action="{{route("permissions.destroy", $permission->id)}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button  type="submit" class="btn btn-danger">Deletar</button>
                        </form>
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$permissions->links()}}
    </div>
@endsection

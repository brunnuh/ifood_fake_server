@extends("adminlte::page")

@section("title", "permissoes do usuario")

@section("content_header")
    <div class="form-group">
        <h2>
            Permissões do usuario {{$user->full_name}}
        </h2>
        <h3>
            <a href="{{route("users.select_permissions", $user->id)}}" class="btn btn-info">Novas Permissões</a>
        </h3>
    </div>
@endsection

@section("content")
    <div class="card-body">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Permissoes</th>
                    <th>Acoes</th>
                </tr>
            </thead>
            <tbody>
            @foreach($user->permissions as $permission)
                <tr>
                    <th>
                        <h6>{{$permission->name}}</h6>
                    </th>
                    <th>
                        <form action="{{route("users.detach", [$user->id,$permission->id])}}" METHOD="POST">
                            @csrf
                            <button class="btn btn-warning">Desvincular</button>
                        </form>
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection

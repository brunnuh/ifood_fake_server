@extends("adminlte::page")

@section("title", "permissoes do usuario")

@section("content_header")
    <div class="form-group">
        <h2>
            Permissões do usuario {{$user->full_name}}
        </h2>
    </div>
@endsection

@section("content")
    <div class="card">
        <div class="card-body">
            <form action="{{route("users.put_permissions", $user->id)}}" METHOD="POST" class="form-group">
                @csrf
                <select name="permissions[]" multiple class="form-control">
                    @foreach($permissions as $permission)
                        <option value="{{$permission->id}}" >
                            {{$permission->name}}
                        </option>
                    @endforeach
                </select>
                <div>
                    <button class="btn btn-dark">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@extends("adminlte::page")

@section("title", "new users")

@section("content_header")
    <h2>Novo Usuario</h2>
@endsection

@section("content")
    <div class="card">
        <div class="card-body">
            <form action="{{route("users.store")}}" class="form" method="POST">
                @csrf
                @include("admin.pages.user._partials.form")
            </form>
        </div>
    </div>
@endsection

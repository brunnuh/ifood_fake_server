@extends("adminlte::page")

@section("title", "new Permission")

@section("content_header")
    <h2>Nova Permissão</h2>
@endsection

@section("content")
    <div class="card">
        <div class="card-body">
            <form action="{{route("permissions.store")}}" class="form" method="POST">
                @csrf
                @include("admin.pages.permission._partials.form")
            </form>
        </div>
    </div>
@endsection

@extends("adminlte::page")

@section("title", "new clientes")

@section("content_header")
    <h2>Novo Cliente</h2>
@endsection

@section("content")
    <div class="card">
        <div class="card-body">
            <form action="{{route("clients.store")}}" class="form" method="POST">
                @csrf
                @include("admin.pages.client._partials.form")
            </form>
        </div>
    </div>
@endsection

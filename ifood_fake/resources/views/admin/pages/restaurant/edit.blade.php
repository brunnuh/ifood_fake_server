@extends("adminlte::page")

@section("title", "update restaurant")

@section("content_header")
    <h2>Atualizar Restaurante {{$restaurant->name}}</h2>
@endsection

@section("content")
    <div class="card">
        <div class="card-body">
            <form action="{{route("restaurants.update", $restaurant->cnpj)}}" class="form" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                @include("admin.pages.restaurant._partials.form")
            </form>
        </div>
    </div>
@endsection

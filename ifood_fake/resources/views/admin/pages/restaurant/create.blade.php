@extends("adminlte::page")

@section("title", "new restaurant")

@section("content_header")
    <h2>Novo Restaurante</h2>
@endsection

@section("content")
    <div class="card">
        <div class="card-body">
            <form action="{{route(isset($user) ? "restaurants.store" : "restaurants.new")}}" class="form" method="POST" enctype="multipart/form-data">
                @csrf
                @include("admin.pages.restaurant._partials.form")
            </form>
        </div>
    </div>
@endsection

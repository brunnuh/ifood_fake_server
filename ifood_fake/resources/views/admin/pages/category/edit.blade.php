@extends("adminlte::page")

@section("title", "update category")

@section("content_header")
    <h2>Atualizar Categoria {{$category->name}}</h2>
@endsection

@section("content")
    <div class="card">
        <div class="card-body">
            <form action="{{route("categories.update", $category->id)}}" class="form" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                @include("admin.pages.category._partials.form")
            </form>
        </div>
    </div>
@endsection

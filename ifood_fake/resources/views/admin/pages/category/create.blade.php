@extends("adminlte::page")

@section("title", "new category")

@section("content_header")
    <h2>Nova Categoria</h2>
@endsection

@section("content")
    <div class="card">
        <div class="card-body">
            <form action="{{route("categories.store")}}" class="form" method="POST" enctype="multipart/form-data">
                @csrf
                @include("admin.pages.category._partials.form")
            </form>
        </div>
    </div>
@endsection

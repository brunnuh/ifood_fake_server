@extends("adminlte::page")

@section("title", "new produto")

@section("content_header")
    <h2>Novo Produto</h2>
@endsection

@section("content")
    <div class="card">
        <div class="card-body">
            <form action="{{route("products.store")}}" class="form" method="POST" enctype="multipart/form-data">
                @csrf
                @include("admin.pages.product._partials.form")
            </form>
        </div>
    </div>
@endsection

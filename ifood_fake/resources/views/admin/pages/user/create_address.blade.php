@extends("adminlte::page")


@section("title", "endereco")

@section("content_header")
    <h2>
        Endereco de {{ $address["full_name"] ?? $address["user"]->full_name}}
    </h2>
@endsection

@section("content")
    <div class="card">
        <div class="card-body">
            <form action="@if(!is_null($address["user_id"])) {{route("address.store", $address["id"] ?? $address["user"]->id)}} @else {{route("address.update", $address["id"] ?? $address["user"]->id)}} @endif" method="POST">
                @csrf
                @if(!is_null($address["user_id"]))
                    @method("PUT")
                @else
                    @method("POST")
                @endif
                @include("admin.pages.user._partials.form_address")
            </form>
        </div>
    </div>
@endsection



@extends("adminlte::page")


@section("title", "endereco")

@section("content_header")
    <h2>
        Endereco de {{ $address_client["full_name"] ?? $address_client["client"]->full_name}}
    </h2>
@endsection

@section("content")
    <div class="card">
        <div class="card-body">
            <form action="{{route("address_client.store", $address_client["id"] ?? $address_client["client"]->id)}}" method="POST">
                @csrf
                @include("admin.pages.client._partials.form_address")
            </form>
        </div>
    </div>
@endsection



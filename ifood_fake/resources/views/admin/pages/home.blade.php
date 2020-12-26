@extends("adminlte::page")

@section("content")
 <div class="container">
     <h2 class="text-center">  Bem Vindo {{auth()->user()->full_name}}</h2>
 </div>
@endsection

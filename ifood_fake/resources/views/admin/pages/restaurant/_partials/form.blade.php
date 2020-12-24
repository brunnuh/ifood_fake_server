@include("admin.includes.alerts")

<div class="form-group">
    <label for="photo">
        Foto do Restaurante
    </label>
    <input type="file" name="image" class="form-control">
</div>
<div class="form-group">
    <input type="text" name="name" placeholder="Nome do Restaurante" class="form-control" value="{{$restaurant->name ?? old("name")}}">
</div>
<div class="form-group">
    <select name="status_operating" id="" class="form-control" >
        <option @if($restaurant->status_operating ?? false) selected @endif value="0">Fechado</option>
        <option @if($restaurant->status_operating ?? false) selected @endif value="1">Funcionando</option>
    </select>
</div>
<div class="form-group">
    <div class="form-group">
        <input type="text" name="phone" placeholder="Telefone do Restaurante" class="form-control" value="{{$restaurant->phone ?? old("phone") }}">
    </div>
</div>

<div class="form-group">
    <button class="btn btn-success">Cadastrar</button>
</div>

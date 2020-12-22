@include("admin.includes.alerts")


<div class="form-group">
    <input type="text" name="street" placeholder="Rua" class="form-control" value="{{$address_client->street ?? old("street")}}">
</div>
<div class="form-group">
    <input type="text" name="neighborhood" placeholder="Bairro" class="form-control" value="{{$address_client->neighborhood ?? old("neighborhood")}}">
</div>
<div class="form-group">
    <input type="number" name="number_house" placeholder="Numero" class="form-control" value="{{$address_client->number_house ?? old("number_house")}}">
</div>
<div class="form-group">
    <input type="text" name="complements" placeholder="Complemento" class="form-control" value="{{$address_client->complements ?? old("complements")}}">
</div>
<div class="form-group">
    <input type="text" name="city" placeholder="Cidade" class="form-control" value="{{$address_client->city ?? old("city")}}">
</div>
<div class="form-group">
    <input type="text" name="state" placeholder="Estado" class="form-control" value="{{$address_client->state ?? old("state")}}">
</div>
<div class="form-group">
    <input type="text" name="reference_point" placeholder="Ponto de Referencia" class="form-control" value="{{$address_client->reference_point ?? old("reference_point")}}">
</div>
<div class="form-group">
    <button class="btn btn-success">Cadastrar</button>
</div>

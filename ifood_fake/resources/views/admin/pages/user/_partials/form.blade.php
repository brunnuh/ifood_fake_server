@include("admin.includes.alerts")

<div class="form-group">
    <input type="text" name="full_name" placeholder="Nome" class="form-control" value="{{old("full_name")}}">
</div>
<div class="form-group">
    <input type="text" name="cpf" placeholder="CPF" class="form-control" value="{{old("cpf")}}">
</div>
<div class="form-group">
    <input type="email" name="email" placeholder="E-mail" class="form-control" value="{{old("email")}}">
</div>
<div class="form-group">
    <input type="text" name="phone" placeholder="Telefone" class="form-control" value="{{old("phone")}}">
</div>
<div class="form-group">
    <input type="text" name="password" placeholder="Senha" class="form-control" value="{{old("password")}}">
</div>
<div class="form-group">
    <button class="btn btn-success">Cadastrar</button>
</div>

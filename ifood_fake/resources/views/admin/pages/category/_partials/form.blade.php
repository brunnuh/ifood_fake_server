@include("admin.includes.alerts")

<div class="form-group">
    <label for="photo">
        Foto da Categoria
    </label>
    <input type="file" name="photo" class="form-control">
</div>
<div class="form-group">
    <input type="text" name="name" placeholder="Nome" class="form-control" value="{{$category->name ?? old("name")}}">
</div>
<div class="form-group">
    <input type="text" name="description" placeholder="descrição" class="form-control" value="{{$category->description ?? old("description") }}">
</div>

<div class="form-group">
    <select name="user_id" class="form-control">
        @foreach($users as $user)
            <option value="{{$user->id}}">{{$user->full_name}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <button class="btn btn-success">Enviar</button>
</div>

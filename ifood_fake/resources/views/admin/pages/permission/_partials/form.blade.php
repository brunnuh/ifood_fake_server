@include("admin.includes.alerts")


<div class="form-group">
    <label >Permissão</label>
    <select name="name" class="form-control">
        @foreach($permissions_options as $option)
            <option value="{{$option["text"]}}">
                {{$option["text"]}}
            </option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label >Descricao da Permissão:</label>
    <input type="text" name="description" placeholder="descrição" class="form-control" value="{{$permission->description ?? old("description") }}">
</div>

<div class="form-group">
    <button class="btn btn-success">Cadastrar</button>
</div>

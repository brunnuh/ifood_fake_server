@include("admin.includes.alerts")

<div class="form-group">
    <label for="photo">
        Foto do Produto
    </label>
    <input type="file" name="image" class="form-control">
</div>
<div class="form-group">
    <label >Nome:</label>
    <input type="text" name="name" placeholder="Ex: Hamburguer" class="form-control" value="{{$product->name ?? old("name")}}">
</div>
<div class="form-group">
    <label >Descricao do produto:</label>
    <input type="text" name="description" placeholder="descrição" class="form-control" value="{{$product->description ?? old("description") }}">
</div>
<div class="form-group">
    <label >Preço</label>
    <input type="text" name="price" placeholder="Ex: 10.00" class="form-control" value="{{$product->price ?? old("price")}}">
</div>
<div class="form-group">
    <label >Quantidade por Pessoa:</label>
    <select name="amount_person" class="form-control">
        @for($i = 1 ; $i <= 20; $i++)
            <option value="{{$i}}">{{$i}}</option>
        @endfor
    </select>
</div>
<div class="form-group">
    <label>Restaurante</label>
    <select name="restaurant_cnpj" class="form-control">
        @foreach($restaurants as $restaurant)
            <option value="{{$restaurant->cnpj}}">{{$restaurant->name}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label>Categoria</label>
    <select name="category_id" class="form-control">
        @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <button class="btn btn-success">Cadastrar</button>
</div>

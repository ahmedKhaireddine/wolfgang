
<div class="form-group">
    <label for="name" class="control-label sr-only">Nom</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') ?? $product->name }}" placeholder="Nom du produit" required="required">
    {!! $errors->first('name', '<small class="error">:message</small>')!!}
</div>
<div class="form-group">
    <label for="reference" class="control-label sr-only">Réference</label>
    <input type="text" name="reference" id="reference" class="form-control" value="{{ old('reference') ?? $product->reference }}" placeholder=" La référence du produit" required="required">
    {!! $errors->first('reference', '<small class="error">:message</small>')!!}
</div>
<div class="form-group">
    <label for="picture" class="control-label sr-only">Photo</label>
    <input type="file" name="picture" id="picture" class="form-control" value="{{ old('picture') ?? $product->picture }}" placeholder="La photo du produit" required="required">
    {!! $errors->first('picture', '<small class="error">:message</small>')!!}
</div>
<div class="form-group">
    <label for="price" class="control-label sr-only">Prix</label>
    <input type="text" name="price" id="price" class="form-control" value="{{ old('price') ?? $product->price }}" placeholder="Prix du produit" required="required">
    {!! $errors->first('price', '<small class="error">:message</small>')!!}
</div>
<div class="form-group">
    <label for="description" class="control-label sr-only">Description</label>
    <textarea name="description" id="description" class="form-control" cols="30" rows="10" placeholder="Description de produit" required="required">{{ old('description') ?? $product->description }}</textarea>
    {!! $errors->first('description', '<small class="error">:message</small>')!!}
</div>
<div class="form-group">
    <a href="{{ route('products.index') }}" class="btn btn-primary">Annuler</a>
    <button type="submit" class="btn btn-primary">Valider</button>
</div>
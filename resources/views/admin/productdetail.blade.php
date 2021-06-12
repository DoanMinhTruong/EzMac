@extends("admin.menu")
@section("admin_content")
@if (session('status'))
<div class="alert alert-warning">
    {{ session('status') }}
</div>
@endif
@if (session('status_success'))
<div class="alert alert-success">
    {{ session('status_success') }}
</div>
@endif
    @if($product)
    <div class="row m-3">
        <form class="col-12 d-block" enctype="multipart/form-data" action="{{ route("admin.update_product" , ['id' => $product['id']]) }}" method="POST" id="form_update_product">
            @csrf
            @method("PUT")
            <div class="form-group row">
              <label for="name" class="col-sm-2 col-form-label">Name:</label>
              <div class="col-sm-10">
                <input type="text" name="name" class="form-control" id="name" placeholder="product name..." value="{{ $product['name'] }}">
              </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Category:</label>
                <div class="col-sm-10">
                  <select class="form-control" name="parent_id" id="">
                        @foreach ($categories as $c)
                            @if($c['id'] == $product['parent_id'])
                                <option selected>{{ $c['name'] }}</option>
                            @else
                                <option>{{ $c['name'] }}</option>
                            @endif
                        @endforeach
                  </select>
                </div>
              </div>
            <div class="form-group row">
              <label for="slug" class="col-sm-2 col-form-label">Slug:</label>
              <div class="col-sm-10">
                <input type="text" name="slug" class="form-control" placeholder="product slug..." value={{ $product['slug'] }}>
              </div>
            </div>
            <div class="form-group row">
                <label for="slug" class="col-sm-2 col-form-label">Price:</label>
                <div class="col-sm-10">
                  <input type="text" name="price" class="form-control"  placeholder="product price..." value="{{ $product['price'] }}">
                </div>
              </div>
            <div class="form-group row">
                <label for="slug" class="col-sm-2 col-form-label">Image:</label>
                <div class="col-sm-10">
                  {{-- <input required data-show-caption="true" type="file" accept="image/*" name="image" class="form-control" placeholder="product image..."> --}}
                  <span class="btn btn-default btn-file">
                    {{-- <input id="product-image" text="{{ $product['image'] }}" name="image" type="file" class="file" multiple data-show-upload="true" data-show-caption="true"> --}}
                    <img id="image-temp" class="border" width="200px" src="/{{ $product['image'] }}" alt="" 
                        onclick="
                            $('#product-image').click();
                        "
                    > <span class="blockquote-footer" onclick="
                    $('#product-image').click();
                ">(click to change)</span>
                    <input id="product-image" type="file" name="image" hidden="true">

                </div>
              </div>
              <div class="form-group row">
                <label for="slug" class="col-sm-2 col-form-label">Description:</label>
                <div class="col-sm-10">
                  <textarea  rows="10" type="text" name="description" class="form-control" placeholder="product description...">{{ $product['description'] }}</textarea>
                </div>
              </div>
              <div class="row justify-content-end m-2">
                <a class="btn btn-secondary mr-3" href="{{ route("admin.product") }}">Back</a>
                <button class="btn btn-success" type="submit">Update</button>
            </div>
          </form>
          
    </div>
    @else
        <div class="alert alert-warning">Nothing here</div>
    @endif
    
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
    $('#product-image').change(function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#image-temp').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
});
</script>
@endsection

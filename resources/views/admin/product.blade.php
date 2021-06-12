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
<div class="row justify-content-end m-2">
    <select style="width:auto;" class="mx-3 form-control" name="" id=""" onchange="location = this.value;">
        <option hidden="true">
        @if($cate_page)
            {{ $cate_page }}
        @endif
        
        </option>
        <option value="{{ route('admin.product') }}">
            All
        </option>
        @foreach ($categories as $c )
            <option value="{{ route('admin.product_slug' , ['slug' => $c['slug']]) }}">
            {{ $c['name'] }}
            </option>
        @endforeach
    </select>
<button class="btn btn-success px-4" data-toggle="modal" data-target="#addproduct">Add</button>
</div>

<div class="modal fade" id="addproduct" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Add Product</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
        <form enctype="multipart/form-data" action="{{ route("admin.add_product") }}" method="POST" id="form_add_product">
            @csrf
            @method("POST")
            <div class="form-group row">
              <label for="name" class="col-sm-2 col-form-label">Name:</label>
              <div class="col-sm-10">
                <input required type="text" name="name" class="form-control" id="name" placeholder="product name...">
              </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Category:</label>
                <div class="col-sm-10">
                  <select class="form-control" name="parent_id" id="">
                        @foreach ($categories as $c)
                            <option>{{ $c['name'] }}</option>
                        @endforeach
                  </select>
                </div>
              </div>
            <div class="form-group row">
              <label for="slug" class="col-sm-2 col-form-label">Slug:</label>
              <div class="col-sm-10">
                <input type="text" name="slug" class="form-control"  placeholder="product slug...">
              </div>
            </div>
            <div class="form-group row">
                <label for="slug" class="col-sm-2 col-form-label">Price:</label>
                <div class="col-sm-10">
                  <input required type="text" name="price" class="form-control"  placeholder="product price...">
                </div>
              </div>
            <div class="form-group row">
                <label for="slug" class="col-sm-2 col-form-label">Image:</label>
                <div class="col-sm-10">
                  {{-- <input required data-show-caption="true" type="file" accept="image/*" name="image" class="form-control" placeholder="product image..."> --}}
                  <span class="btn btn-default btn-file">
                    <input name="image" type="file" class="file" multiple data-show-upload="true" data-show-caption="true">
                </div>
              </div>
              <div class="form-group row">
                <label for="slug" class="col-sm-2 col-form-label">Description:</label>
                <div class="col-sm-10">
                  <textarea required rows="10" type="text" name="description" class="form-control" placeholder="product description..."></textarea>
                </div>
              </div>
          </form>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <button type="button" class="btn btn-primary" onclick="event.preventDefault();document.getElementById('form_add_product').submit();">Done</button>
    </div>
  </div>
</div>
</div>


<table class="table">
<thead>
  <tr>
    <th scope="col">ID</th>
    <th scope="col">Name</th>
    <th scope="col">Price</th>
    <th scope="col">Image</th>
    <th scope="col">Created At</th>
    <th scope="col">Action</th>
  </tr>
</thead>
<tbody>
    <?php $i = 1; ?>
    @foreach ($products as $p )
    <tr>
        <th scope="row">{{ $i++ }}</th>
        <td>{{ $p['name'] }}</td>
        <td>{{ $p['price'] }}</td>
        <td>
            <img width="100px" src="{{ url($p['image']) }}" alt="">
        </td>
        <td>{{ !$p['created_at']  ? 'NULL' : $p['created_at']}}</td>

        <td>
            <form action="{{ route('admin.delete_product' , [$p['id']]) }}" method="POST">
                @csrf
                @method("DELETE")
                <button class="btn btn-danger">X</button>
            </form>                  
        </td>
        <td>
            <a class="btn btn-primary" href="{{ route('admin.product_detail' , ['slug' => $p['slug']] ) }}">Edit</a>
        </td>
      </tr>
    @endforeach
</tbody>
</table>
@endsection
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
    <button class="btn btn-primary px-4" data-toggle="modal" data-target="#addcategory">Add</button>
</div>

<div class="modal fade" id="addcategory" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Category</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route("admin.add_category") }}" method="POST" id="form_add_category">
                @csrf
                @method("POST")
                <div class="form-group row">
                  <label for="name" class="col-sm-2 col-form-label">Name:</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="name" placeholder="category name...">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="slug" class="col-sm-2 col-form-label">Slug:</label>
                  <div class="col-sm-10">
                    <input type="text" name="slug" class="form-control" id="slug" placeholder="category slug...">
                  </div>
                </div>
              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="event.preventDefault();document.getElementById('form_add_category').submit();">Done</button>
        </div>
      </div>
    </div>
  </div>


<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Slug</th>
        <th scope="col">Created At</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($categories as $c )
        <tr>
            <th scope="row">{{ $c['id'] }}</th>
            <td>{{ $c['name'] }}</td>
            <td>{{ $c['slug'] }}</td>
            <td>{{ !$c['created_at']  ? 'NULL' : $c['created_at']}}</td>
            <td>
                <form action="{{ route('admin.delete_category' , [$c['id']]) }}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button class="btn btn-danger">X</button>
                </form>
                                   
            </td>
          </tr>
        @endforeach
    </tbody>
  </table>
@endsection
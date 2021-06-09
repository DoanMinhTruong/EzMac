@extends("admin.menu")
@section("admin_content")
<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Role</th>
        <th scope="col">Created At</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($users as $user )
        <tr>
            <th scope="row">{{ $user['id'] }}</th>
            <td>{{ $user['name'] }}</td>
            <td>{{ $user['email'] }}</td>
            <td>{{ $user['role'] == 1 ? 'Admin' : 'User' }}</td>
            <td>{{ !$user['created_at']  ? 'NULL' : $user['created_at']}}</td>
            <td>
                <form action="{{ route('admin.delete_user' , [$user['id']]) }}" method="POST">
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
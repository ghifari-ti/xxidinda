@extends('layouts.sbadmin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Edit User</h3>
        </div>
        <div class="card-body">
            <form method="post" action="{{ url('/user/update/'.$user->id) }}">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Name</label>
                    <input type="text" name="name" value="{{ $user->name }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Email</label>
                    <input type="email" value="{{ $user->email }}" class="form-control" id="exampleInputPassword1" disabled>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Type</label>
                    <select class="form-control" name="is_admin" id="exampleFormControlSelect1" required>
                        <option value="{{ $user->is_admin }}" selected> {{ $user->is_admin ? 'Admin' : 'Reguler' }}</option>
                        <option value="0">Reguler</option>
                        <option value="1">Admin</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
    <div class="card mt-2 bg-danger">
        <div class="card-body">
            <h3 class="text-white">Delete this user</h3>
            <form action="{{ url('/user/delete/'.$user->id)  }}" method="post">
                @csrf
                <input type="hidden" name="_method" value="delete">
                <button class="btn btn-info">delete</button>
            </form>

        </div>
    </div>
    @if(\Illuminate\Support\Facades\Session::get('success'))
        <script>
            Swal.fire({
                title: 'Success!',
                text: '{{ \Illuminate\Support\Facades\Session::get('success') }}',
                icon: 'success',
                confirmButtonText: 'Ok'
            })
        </script>
    @endif
@endsection

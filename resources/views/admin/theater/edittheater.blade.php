@extends('layouts.sbadmin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Edit Theater</h3>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('theater.update', $theater->id) }}">
                @csrf
                <input type="hidden" name="_method" value="put">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Name</label>
                    <input type="text" name="name" value="{{ $theater->name }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Capacity</label>
                    <input type="number" name="capacity" value="{{ $theater->capacity }}" class="form-control" id="exampleInputPassword1" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Type</label>
                    <select class="form-control" name="type" id="exampleFormControlSelect1" required>
                        <option value="{{ $theater->type }}" selected>{{ $theater->type }}</option>
                        <option value="Reguler">Reguler</option>
                        <option value="Dolby Atmos">Dolby Atmos</option>
                        <option value="IMAX">IMAX</option>
                        <option value="The Premiere">The Premiere</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Schedule (tekan enter untuk buat jadwal baru)</label>
                    <input type="text" name="schedule" value="{{ $theater->jadwal }}" data-role="tagsinput" id="exampleInputPassword1" required>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
    <div class="card mt-2 bg-danger">
        <div class="card-body">
            <h3 class="text-white">Delete this theater</h3>
            <form action="{{ route('theater.destroy', $theater->id) }}" method="post">
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

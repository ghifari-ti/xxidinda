@extends('layouts.sbadmin')

@section('content')
    <h3>Dashboard</h3>
    <div class="row">
        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <h2>{{ count($movies) }}</h2>
                    <p>Jumlah Film</p>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <h2>{{ count($theaters) }}</h2>
                    <p>Jumlah Theater</p>
                </div>
            </div>
        </div>
    </div>
@endsection

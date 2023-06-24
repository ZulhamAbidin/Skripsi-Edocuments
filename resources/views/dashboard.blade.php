@extends('layouts.main')

@section('container')
<div class="container">
    <h1>Dashboard</h1>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-link">Log Out</button>
    </form>

    <div class="card-deck">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data Count</h5>
                <p class="card-text">{{ $dataCount }}</p>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">User Count</h5>
                <p class="card-text">{{ $userCount }}</p>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Document Count</h5>
                <p class="card-text">{{ $documentCount }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
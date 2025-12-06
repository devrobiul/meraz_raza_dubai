@extends('admin.layout.app')
@section('title')
    Dashboard
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow-sm p-4 text-center">
            <h3 class="mb-2">Welcome, {{ auth()->user()->name }}!</h3>
            <p class="text-muted">You are logged in as an admin. Here’s a quick overview of your dashboard.</p>
        </div>
    </div>
</div>
@endsection

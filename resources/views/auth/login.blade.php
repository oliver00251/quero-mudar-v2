@extends('layouts.app')

@section('title', 'Login')



@section('content')
<div class="container mt-5">
    <h2 class="text-center">Login</h2>
    <div class="row justify-content-center">
        <div class="col-md-4">
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <form action="{{ url('/login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>
<style>
    .content {
    display: flex;
    min-height: 100vh;
    align-items: center;
}
</style>
@endsection

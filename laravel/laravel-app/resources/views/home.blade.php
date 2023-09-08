@extends('layouts.app')
<a href="/edit">edit profile</a>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1>welcome user dashboard</h1>
                    {{ __('You are logged in!') }}
                    <a href="homepage">books</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

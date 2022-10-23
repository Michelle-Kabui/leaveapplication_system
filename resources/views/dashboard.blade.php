@extends('layouts.app')

@section('content')
    <div class="text-danger">
        @if (session('status'))
            {{ session('status') }}
        @endif
    </div>
    <div class="text-success">
        <h1> DASHBOARD </h1>

    </div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Home</h2>
    <div class="panel panel-default">
        <div class="panel-heading">Home page</div>
        <div class="panel-body">
            Page content<br/><br/>
            <a href="{{ route('gallery.index') }}">Go to gallery</a>
        </div>
    </div>
</div>
@endsection

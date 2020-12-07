
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Gallery <div class="pull-right"><a class="btn btn-success" href="{{ route('gallery.create') }}">Add new</a></div></h2>
    <div class="panel panel-default">
        <div class="panel-heading">
            Photos
        </div>
        <div class="panel-body">
            <div class="row">
                @forelse ($photos as $photo)
                    <div class="col-md-3 text-center" style="margin-bottom: 20px;">
                        <div class="image" style="height: 200px; overflow-y: hidden;"><img width="100%" src="{{ url('storage', [$photo->file_path]) }}" alt="photo" /></div>
                        <span>{{ $photo->uploader_name }}</span>
                    </div>
                @empty
                    <div class="col-md-12">
                        <p>No photos.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection

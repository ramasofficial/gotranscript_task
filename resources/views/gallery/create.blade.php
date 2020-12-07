
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Upload photo <div class="pull-right"><a class="btn btn-success" href="{{ route('gallery.index') }}">Return back</a></div></h2>
    <div class="panel panel-default">
        <div class="panel-heading">
            Images uploader from pc and link
        </div>
        <div class="panel-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('gallery.store') }}" method="post" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Your name:</label>
                            <input name="uploader_name" class="form-control" value="{{ old('uploader_name') }}" autofocus />
                        </div>

                        <div class="form-group">
                            <label>Show from:</label>
                            <input name="show_from" class="form-control datepicker" value="{{ old('show_from') ? old('show_from') : $today }}" />
                        </div>

                        <div class="form-group">
                            <label>Show until:</label>
                            <input name="show_until" class="form-control datepicker" value="{{ old('show_until') ? old('show_until') : '' }}" />
                        </div>

                        <div class="form-group">
                            <label>Upload from file:</label>
                            <input type="file" id="file_path" name="file_path">
                        </div>

                        <div class="form-group">
                            <label>Or paste link:</label>
                            <input name="url" class="form-control" value="{{ old('url') }}" />
                        </div>

                        <div class="form-group">
                            <button class="btn btn-success" type="submit">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(function() {
        jQuery.datetimepicker.setLocale('lt');

        jQuery('.datepicker').datetimepicker({
            i18n:{
                lt:{
                    months:[
                        'Sausis', 'Vasaris', 'Kovas', 'Balandis',
                        'Gegužė', 'Birželis', 'Liepa', 'Rugpjūtis',
                        'Rugsėjis', 'Spalis', 'Lapkritis', 'Gruodis'
                    ],
                    dayOfWeek:[
                        'Pir', 'An', 'Tre', 'Ket',
                        'Pen', 'Šeš', 'Sek'
                    ]
                }
            },
            format:'Y-m-d',
            dayOfWeekStart: 1,
            timepicker: false,
            scrollMonth : false,
            scrollInput : false,
            minDate : new Date(),
        });
    });
</script>
@endsection

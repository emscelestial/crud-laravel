@extends('diary.layout')

@section('content')

<div class="row">
    <div class="col=lg=12 margin tb mt 5">
        <div class="pull-left">
            <h2> Show Diaries</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('diary.index') }}"> Back</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong> Title: </strong>
            {{ $diary->title}}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-22">
        <div class="form-group">
            <strong>Body:</strong>
            {{$diary->body}}

        </div>
    </div>
</div>

@endsection

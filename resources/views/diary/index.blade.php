@extends('diary.layout')

@section('content')

<div class="row">
    <div class="col-lg-12 mL-tb">
        <div class="pull-left">
            <h2>DIARIES</h2>
        </div>

        <div class="pull-right">
            <a class="btn btn-success" href="{{route('diary.create')  }}"> Create New Diary</a>
        </div>
        <br>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{$message}}</p>
</div>
@endif

<table class="table table=bordered">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Body</th>
        <th width="280px">Action</th>
    </tr>
    @foreach($diary as $diary)
    <tr>
        <td>{{$diary->id}}</td>
        <td>{{$diary->title}}</td>
        <td>{{$diary->body}}</td>
        <td>
            <form action="{{ route('diary.destroy' , $diary->id) }}" method="POST">
                <a class="btn btn-info" href="{{ route('diary.show', $diary->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('diary.edit', $diary->id) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>

            </form>
        </td>
    </tr>
    @endforeach

</table>

@endsection

{{$diary->links()}}






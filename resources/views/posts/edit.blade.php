@extends('layouts.app')

@section('content')
    <div class="container">
        @if($entry->user_id == Auth::user()->id)
        <form method="post" action="/posts/{{ $entry->id }}">
            {{ method_field('PATCH') }}

            {{ csrf_field() }}
            <div class="form-group">
                <label for="inputTitle">Title</label>
                <input type="text" id="inputTitle" name="title" class="form-control" value="{{$entry->title }}" disabled>
            </div>
            <div class="form-group">
                <label for="inputBody">Body</label>
                <textarea id="inputBody" class="form-control" style="height: 500px;" name="body">{{ $entry->latest->body }}</textarea>
            </div>
            <div class="form-group">
                <label for=""inputDescription">Description of Changes</label>
                <input type="text" id="inputDescription" name="description" class="form-control" placeholder="No particular reason." required>
            </div>
            <button type="submit" class="btn btn-success pull-right">Update</button>
        </form>
        @else
            <span class="text-danger"><h3>You are not authorized to view this post.</h3></span>
        @endif
    </div>
@stop
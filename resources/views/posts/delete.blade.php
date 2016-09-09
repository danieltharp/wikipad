@extends('layouts.app')

@section('content')
    <div class="container">
        @if($entry->user_id == Auth::user()->id)
            <h2>{{ $entry->title }}</h2>
            <hr>
            Are you sure you wish to delete this file?
        <form method="post" action="/posts/{{ $entry->id }}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <div class="btn-group pull-right">
                <a href="/posts/{{ $entry->id }}" class="btn btn-primary">
                    Cancel
                </a>
                <button type="submit" class="btn btn-danger">Delete</button>
            </div>
        </form>
        @else
            <span class="text-danger"><h3>You are not authorized to delete this post.</h3></span>
        @endif
    </div>

@stop
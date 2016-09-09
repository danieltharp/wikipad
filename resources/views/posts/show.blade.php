@extends('layouts.app')

@section('content')
    <div class="container">
    @if($entry->user_id == Auth::user()->id)
        <h2>{{ $entry->title }}</h2>
        <hr>
        {!! nl2br(e($entry->latest->body)) !!}
        <br /><br />
        <div class="btn-group pull-right">
            <a href="/posts/{{ $entry->id }}/edit" class="btn btn-info">Edit</a>
            <a href="/posts/{{ $entry->id }}/delete" class="btn btn-danger">Delete</a>
        </div>
    @else
        <span class="text-danger"><h3>You are not authorized to view this post.</h3></span>
    @endif
    </div>

@stop
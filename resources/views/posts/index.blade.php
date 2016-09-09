@extends('layouts.app')

@section('content')
    <div class="container">
        <ul class="list-group">
        @foreach($entries as $entry)
                <li class="list-group-item">
                    <a href="/posts/{{ $entry->id }}">
                        {{ $entry->title }}
                    </a>

                    <span class="pull-right">
                        <a href="/posts/{{ $entry->id }}/edit">Edit</a>&nbsp;
                        <a href="/posts/{{ $entry->id }}/delete" class="text-danger">Delete</a>
                    </span>
                </li>
        @endforeach
        </ul>
    <a href="/posts/new">Create a new entry.</a>
    </div>
@stop
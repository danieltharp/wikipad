@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="post" action="/posts">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="inputTitle">Title</label>
                <input type="text" id="inputTitle" name="title" class="form-control" placeholder="Clever Title">
            </div>
            <div class="form-group">
                <label for="inputBody">Body</label>
                <textarea id="inputBody" class="form-control" style="height: 500px;" name="body"></textarea>
            </div>
            <button type="submit" class="btn btn-success pull-right">Done</button>
        </form>
    </div>
@stop
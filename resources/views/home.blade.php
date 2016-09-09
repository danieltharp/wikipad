@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <a href="/posts">View Your Posts</a>
                    <span class="pull-right">
                        <a href="/posts/new">Write a New Post</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

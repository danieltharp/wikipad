@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="form-group">
            <form method="post" action="">
                <ul>
                    @foreach($versions as $version)
                       <li>
                           {{ dd($version) }}
                       </li>
                    @endforeach
                </ul>
            </form>
        </div>
    </div>
@stop
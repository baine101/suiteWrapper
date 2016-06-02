@extends('app')


    @section('content')
        <div class="container">
            <div class="content">
                <div class="title">Laravel 5</div>
                @if(isset($error['name']))
                <p>{{$error['name']}}</p>
                @else
                <p>{{$suiteR}}</p>
                @endif
            </div>
        </div>
    @endsection

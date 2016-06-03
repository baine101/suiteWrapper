@extends('app')


    @section('content')
        <div class="container">
            <div class="content">
                <div class="title">Laravel 5</div>
                @if(isset($error['name']))
                <p>{{$error['name']}}</p>
                @else
                <p>
                {{$sessionId}}<br>
                {{$getEntryResult}}</p>
                @endif
            </div>
        </div>
    @endsection

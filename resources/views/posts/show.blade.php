@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row">

        <div class="col-8">

            <img src="/storage/{{$post->image}}" class="w-50">

        </div>
        <div class="col-4">
            <div class="d-flex align-items-center">
                <div class="pr-3">
                    <img src="/storage/{{$post->user->profile->image}}" class="rounded-circle w-100" style="max-width: 50px">
                </div>
                <div>
                    <div class="font-weight-blod">
                        <a href="/profile/{{$post->user->id}}">
                            <span class="text-dark">{{$post->user->username}}</span>
                        </a>
                        <a href="" class="pl-3">Follow</a>
                    </div>
                </div>
            </div>

            <hr>
            <p>
                <span class="font-weight-blod">
                    <a href="/profile/{{$post->user->id}}">
                        <span class="text-dark">{{$post->user->username}}</span>
                    </a>

                
                </span> {{$post->caption}}</p>
        </div>
   </div>
@endsection

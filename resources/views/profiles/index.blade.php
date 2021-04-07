@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row">
       <div class="col-3 p-5">

           <img src="/storage/{{$user->profile->image}}" class="rounded-circle w-100">
       </div>
       <div class="col-9 pt-5">
           <div class="d-flex justify-content-between allign-item-baseline">

               <div class="d-flex align-items-center pb-4">
                <div class="h4">{{$user->username}}</div>

                <follow-button user-id="{{$user->id}}" follows="{{$follows}}"></follow-button>
               </div>

               @can('update',$user->profile)
               <a href="/p/create">Add new post</a>
               @endcan


           </div>
           @can('update',$user->profile)
           <a href="/profile/{{$user->id}}/edit">Edit Profile</a>

           @endcan
           <div class="d-flex">
               <div class="pr-4"><strong>{{$postCount}}</strong>posts</div>
               <div class="pr-4"><strong>2k</strong>followers</div>
               <div class="pr-4"><strong>{{$followingCount}}</strong>following</div>
           </div>
           <div class="pt-5 font-weight-blod">{{$user->profile->title}}</div>
           <div>{{$user->profile->description}} </div>
           <div><a href="#"></a>{{$user->profile->url}}</div>


       </div>
    </div>
    <div class="row pt-5">
        @foreach($user->posts as $post)

            <div class="col-4 pb-4 ">

                <a href="/p/{{$post->id}}">
                    <img src="/storage/{{$post->image}}" class="w-100">
                </a>

            </div>



        @endforeach




    </div>
</div>
@endsection

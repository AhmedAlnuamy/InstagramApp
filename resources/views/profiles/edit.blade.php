@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/profile/{{$user->id}}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PATCH')
            <div class="row">
                <div class="col-8 offset-2">
                    <div class="row">
                        <h1>Edit profile</h1>
                    </div>
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label"> Title</label>


                            <input id="name"
                            type="text"
                            class="form-control @error('title') is-invalid @enderror"
                            name="title"

                            value="{{ old('title') ?? $user->profile->title}}" required
                            autocomplete="title" autofocus>

                            @if ($errors->has('title'))

                                <strong>{{$errors->first('title') }}</strong>

                            @endif

                        </div>


                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label"> description</label>


                            <input id="name"
                            type="text"
                            class="form-control @error('description') is-invalid @enderror"
                            name="description"

                            value="{{ old('description') ?? $user->profile->description }}" required
                            autocomplete="description" autofocus>

                            @if ($errors->has('description'))

                                <strong>{{$errors->first('title') }}</strong>

                            @endif

                        </div>


                    <div class="form-group row">
                        <label for="url" class="col-md-4 col-form-label"> url</label>


                        <input id="name"
                        type="text"
                        class="form-control @error('url') is-invalid @enderror"
                        name="url"

                        value="{{ old('url') ?? $user->profile->url}}" required
                        autocomplete="url" autofocus>

                        @if ($errors->has('url'))

                            <strong>{{$errors->first('url') }}</strong>

                        @endif

                    </div>
                        <div class="row">
                            <label for="image" class="col-md-4 col-form-label">Profile Image</label>
                            <input type="file",class="form-control-file" ,id="image", name="image">

                            @if ($errors->has('image'))

                            <strong>{{ $errors->first('image') }}</strong>

                            @endif
                        </div>
                        <div class="row pt-4">
                            <button class="btn btn-primary">Save profile</button>
                        </div>


                </div>

            </div>

    </form>
</div>
@endsection

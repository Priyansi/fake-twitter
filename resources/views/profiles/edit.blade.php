@extends('layouts.app')

@section('content')
<div class="container">

    <form action="/profile/{{ $user->id }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PATCH')
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-group row align-items-baseline d-flex">
                    <div class="col-md-6">
                        <h4 style="font-size: 1.5vw"><b>Edit Profile</b></h4>
                    </div>
                    <div class="col-md-6 text-md-right">
                        <button type="submit" class="btn btn-primary" style="border-radius: 40px;">
                            <b>Save</b>
                        </button>
                    </div>
                </div>

            
                <div class="form-group row align-items-baseline pr-3 pl-3">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Profile Photo</span>
                        </div>
                        
                        <div class="custom-file">
                            <input id="profile_image" type="file" 
                            class="custom-file-input
                            @error('profile_image') is-invalid @enderror" 
                            name="profile_image" value="{{old('profile_image')}}">
                            <label class="custom-file-label" for="profile_image">Choose file</label>
                        </div>


                        @error('profile_image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row align-items-baseline pr-3 pl-3">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Cover Photo</span>
                        </div>
                        <div class="custom-file">
                            <input id="cover_image" type="file" 
                            class="custom-file-input
                            @error('cover_image') is-invalid @enderror" 
                            name="cover_image" value="{{old('cover_image')}}">
                            <label class="custom-file-label" for="cover_image">Choose file</label>
                        </div>


                        @error('cover_image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row align-items-baseline pr-3 pl-3">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Name</span>
                        </div>

                        <input id="name" type="text" 
                        class="form-control 
                        @error('name') is-invalid @enderror" 
                        name="name" value="{{ old('name') ?? $user->name }}"
                        maxlength="50">

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row align-items-baseline pr-3 pl-3">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Bio</span>
                        </div>

                        <input id="bio" type="text" 
                        class="form-control 
                        @error('bio') is-invalid @enderror" 
                        name="bio" value="@if(!empty($user->profile->bio)){{$user->profile->bio}}@else{{old('bio')}}@endif"
                        maxlength="160">

                        @error('bio')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row align-items-baseline pr-3 pl-3">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Location</span>
                        </div>

                        <input id="location" type="text" 
                        class="form-control 
                        @error('location') is-invalid @enderror" 
                        name="location" value="@if(!empty($user->profile->location)){{$user->profile->location}}@else{{old('location')}}@endif"
                        maxlength="30">

                        @error('location')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

            </div>
        </div>
    </form>

</div>
@endsection

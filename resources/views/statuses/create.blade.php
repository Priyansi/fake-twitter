@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/status" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="form-group row align-items-baseline">
                    <label for="tweet" class="col-md-2 col-form-label text-md-right">
                        <img src ="https://pbs.twimg.com/profile_images/1270546979320258560/zDtExCwZ_400x400.jpg" 
                            class="rounded-circle" 
                            style="max-width:75%">
                    </label>

                    <div class="col-md-10">
                        <input id="tweet" type="tweet" 
                        class="form-control 
                        @error('tweet') is-invalid @enderror" 
                        name="tweet" value="{{ old('tweet') }}"
                        maxlength="144" 
                        required autocomplete="tweet" 
                        placeholder="What's Happening?">

                        @error('tweet')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row align-items-baseline">
                    <label for="image" class="col-md-2 col-form-label text-md-right">
                        <i class="fa fa-picture-o fa-lg" style="color: #00acee"></i>
                    </label>

                    <div class="col-md-8">
                        <input id="image" type="file" 
                        class="form-control-file"
                        name="image">

                        @error('image')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="col-md-2 text-md-right">
                        <button type="submit" class="btn btn-primary" style="border-radius: 40px;">
                            <b>Tweet</b>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </form>
</div>
@endsection

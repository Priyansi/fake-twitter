@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-n2">
        <div class="col-6 mx-auto" style="border-bottom: 0.6em solid #e6e6e6;">
            <a href="/"  style="text-decoration: none">
                <div class="pb-2 text-dark" style = "font-size:1.5vw">
                    <b>Home</b>
                </div>
            </a>
        </div>
    </div>
    @foreach ($statuses as $status)
        <div class="row">
            <div class="col-6 mx-auto border-bottom">


                <div class="row">
                    <div class="col-2 pl-3 pb-2 pt-2 text-center">
                        <a href="/profile/{{$status->user->profile->user_id}}">
                            <img src ="{{$status->user->profile->profileImage()}}" 
                                class="rounded-circle" style="max-width:75%">
                        </a>
                    </div>


                    <div class="col-10 ml-n2">
                        <div class="d-flex pt-2 ml-n3">
                            <a href="/profile/{{$status->user->profile->user_id}}">
                                <div class="pr-1 text-dark">
                                    <b>{{ $status->user->name }}</b>
                                </div>
                            </a>
                            <a href="/profile/{{$status->user->profile->user_id}}" style="text-decoration:none">
                                <div class="text-secondary pr-1 d-flex">
                                    <p>@</p>
                                    <p>{{ $status->user->username }}</p>
                                </div>
                            </a>
                            <div class="text-secondary pr-1">{{$user->created_at->format('M')}} {{$user->created_at->format('Y')}}</div>
                        </div>
                        <div class = "ml-n3 mt-n3">
                            {{$status->tweet}}
                        </div>
                        @if(!empty($status->image))
                            <a href="/status/{{$status->id}}">
                                <div class="pt-2 pr-2 row">
                                    <div class="rounded" style="
                                    background-image: url('/storage/{{$status->image}}'); 
                                    background-repeat:no-repeat;
                                    background-position: center;
                                    background-size: 100%;
                                    width: 100%;
                                    padding-top: 56.25%;">
                                        <span></span> <!-- Hacky but background image doesn't diaplay without it -->
                                    </div>
                                </div>
                            </a>
                        @endif
                        <div class="row pt-2 pb-2" >
                            <div class="col-4 text-center text-secondary">
                                <i class="fa fa-comment-o"></i>
                            </div>
                            <div class="col-4 text-center text-secondary">
                                <i class="fa fa-retweet"></i>
                            </div>
                            <div class="col-4 text-center text-secondary">
                                <i class="fa fa-heart-o"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection

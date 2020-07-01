@extends('layouts.app')

@section('content')
<div class="container">


    <div class="row">
        <div class="col-6 p-3 mx-auto border-bottom" style="position:relative; display:inline; line-height: 0px;">

            <img src = "{{$user->profile->coverImage()}}" 
                style="max-width:100%">

        <img src ="{{$user->profile->profileImage()}}" 
                class="rounded-circle" 
                style="z-index:3; top:35%; left:5%; position:absolute; max-width:20%; border: 4px solid white">
            
            <div class="p-2 text-right">
                @can('update', $user->profile)
                <button type="button" class="btn btn-outline-primary" style="border-radius: 40px;">
                    <a href="/profile/{{$user->id}}/edit"  style="text-decoration: none">
                        <b>Edit Profile</b>
                    </a>
                    @else
                <follow-button user-id = "{{$user->id}}" follows = "{{ $follows }}"></follow-button>
                @endcan    
            </div>

            <div class = "pl-3 pb-3 pt-3" style="font-size:1.3vw">
                <b>{{ $user -> name }}</b>
            </div>


            <div class = "pl-3 text-secondary pb-2 d-flex" style="font-size:1vw">
                <p>@</p>
                <p>{{ $user -> username }}</p>
            </div>

        @if (!empty($user->profile->bio)) 
            <div class = "pl-3 pb-1" style="font-size:1.1vw"><p>{{$user->profile->bio}}</p></div>
        @endif
            <div class = "pl-3 d-flex pb-4" style="display:inline-block">
                @if (!empty($user->profile->location)) 
                <i class="fa fa-map-marker text-secondary pr-2" aria-hidden="true" style="display: inline-flex; vertical-align: middle">{{$user->profile->location}}</i>
                @endif
            <i class="fa fa-calendar text-secondary" aria-hidden="true" style="display: inline-flex; vertical-align: middle">Joined {{$user->created_at->format('M')}} {{$user->created_at->format('Y')}}</i>
            </div>


            <div class="pl-3 row">
                <div class="col-2 d-flex">
                    <div class="pr-1"><b>{{$followersCount}}</b></div>
                    <div class="text-secondary">Following</div>
                </div>


                <div class="col-2 d-flex">
                    <div class="pr-1"><b>{{$followingCount}}</b></div>
                    <div class="text-secondary">Followers</div>
                </div>


                <div class="col-8 text-right pr-4">
                    @can('update', $user->profile)
                        <a href="/status/create">What's Happening?</a>
                    @endcan
                </div>


            </div>
        </div>
    </div>

    @foreach ($user->statuses as $status)
        <div class="row">
            <div class="col-6 mx-auto border-bottom">


                <div class="row">
                    <div class="col-2 pl-3 pb-2 pt-2 text-center">
                        <a href="/profile/{{$user->profile->user_id}}">
                            <img src ="{{$user->profile->profileImage()}}" 
                            class="rounded-circle" style="max-width:75%">
                        </a>
                    </div>


                    <div class="col-10 ml-n2">
                        <div class="d-flex pt-2 ml-n3">
                            <a href="/profile/{{$user->profile->user_id}}">
                                <div class="pr-1 text-dark">
                                    <b>{{ $user->name }}</b>
                                </div>
                            </a>
                            <a href="/profile/{{$user->profile->user_id}}" style="text-decoration:none">
                                <div class="text-secondary pr-1 d-flex">
                                    <p>@</p>
                                    <p>{{ $user->username }}</p>
                                </div>
                            </a>
                            <div class="text-secondary pr-1">{{$status->created_at->format('M')}} {{$status->created_at->format('Y')}}</div>
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

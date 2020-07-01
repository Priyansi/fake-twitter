@extends('layouts.app')

@section('content')
<div class="container">            
    <div class="row">
            <div class="col-8 mx-auto">
                <div class="row">
                    <div class="col-8">
                        <img src="/storage/{{$status->image}}" style="max-width: 100%">
                    </div>
                    <div class="col-4">
                        <div class="row d-flex">
                            <div class="col-4">
                                <a href="/profile/{{$status->user->id}}">
                                    <img src ="{{$status->user->profile->profileImage()}}" 
                                        class="rounded-circle" 
                                        style="max-width:80%">
                                </a>
                            </div>
                            <div class="col-8" style="margin-left: -10%">
                                <div>
                                    <a href="/profile/{{$status->user->id}}" style="text-decoration: none">
                                        <span class="text-dark"><b>{{$status->user->name}}</b></span>
                                    </a>
                                </div>
                                <div>
                                    <a href="/profile/{{$status->user->id}}"  style="text-decoration: none">
                                        <span class="text-secondary">{{"@".$status->user->username}}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row pl-4 pt-2">
                            <h3 style="font-size: 1.8vw">{{$status->tweet}}</h3>
                        </div>
                        <div class="row pt-2 pb-2 border-top border-bottom" >
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
</div>
@endsection

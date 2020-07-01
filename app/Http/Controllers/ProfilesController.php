<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Image;

class ProfilesController extends Controller
{
    public function index(\App\user $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains( $user->id ) : false;

        $followersCount = \Cache::remember(
            'count.followers.'. $user->id,
            now()->addSeconds(30),
            function () use ($user){
                return $user->following->count();
            });

        $followingCount = \Cache::remember(
            'count.following.'. $user->id,
            now()->addSeconds(30),
            function () use ($user){
                return $user->profile->followers->count();
            });
            
        return view('/profiles/index', compact('user', 'follows', 'followersCount', 'followingCount'));
    }

    public function edit(\App\User $user)
    {
        $this->authorize('update', $user->profile);
        return view('/profiles/edit', compact('user'));
    }

    public function update(\App\User $user)
    {
        $data = request()->validate([
            'profile_image'=>'',
            'cover_image'=>'',
            'name'=>'required',
            'bio'=>'',
            'location'=>'',
        ]);

        if(request('profile_image')){
            $imagePathProfile = request('profile_image')->store('profile', 'public');

            $imageProfile = Image::make(public_path("storage/{$imagePathProfile}"))->fit(400, 400);
            $imageProfile->save();
            $data['profile_image'] = $imagePathProfile;
        }

        if(request('cover_image')){
            $imagePathCover = request('cover_image')->store('profile', 'public');

            $imageCover = Image::make(public_path("storage/{$imagePathCover}"))->fit(1500, 500);
            $imageCover->save();
            $data['cover_image'] = $imagePathCover;
        }

        auth()->user()->update(['name' => $data['name']]);
        unset($data['name']);
        auth()->user()->profile->update($data);

        return redirect("/profile/{$user->id}");
    }
}

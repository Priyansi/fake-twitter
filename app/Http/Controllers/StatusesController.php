<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Status;

class StatusesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('statuses/create');
    }

    public function store()
    {
        $data = request()->validate([
            'tweet'=>'required',
            'image'=>'image',
        ]);
        if(request('image')){
            $imagePath = request('image')->store('uploads', 'public');
            $data['image'] = $imagePath;
        }

        auth()->user()->statuses()->create($data);
        return redirect('/profile/' . auth()->user()->id);
    }

    public function show(\App\Status $status)
    {
        return view('statuses/show', compact('status'));
    }

    public function index()
    {
        $users = auth()->user()->following()->pluck('profiles.user_id');
        $statuses = Status::whereIn('user_id', $users)->with('user')->latest()->get();
        
        return view('statuses.index', compact('statuses'));
    }
}

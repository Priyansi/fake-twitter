<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    public function profileImage()
    {
        $imagePath = ($this->profile_image) ? '/storage/' . $this->profile_image : 'https://pbs.twimg.com/media/C8QsNInXUAAyjZQ.jpg';
        return $imagePath;
    }

    public function coverImage()
    {
        $imagePath = ($this->cover_image) ? '/storage/' . $this->cover_image : 'https://storycorpsorg-staging.s3.amazonaws.com/uploads/HeroLightBlue-1500x500-1-1500x500.png';
        return $imagePath;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function followers()
    {
        return $this->belongsToMany(User::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    public function profileImage()
    {
        $imagePath = ($this->profile_image) ? $this->profile_image : 'profile/7CeZaQ9Uh2PLU9gQyZ7B7pcUIF2c7C3MJ93RQ41Z.jpeg';
        return '/storage/'. $imagePath;
    }

    public function coverImage()
    {
        $imagePath = ($this->cover_image) ? $this->cover_image : 'profile\PwdzeIFKmYmt5ta0AvTehzK4i6PXcPgFALsvOICG.jpeg';
        return '/storage/'. $imagePath;
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

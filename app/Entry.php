<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Entry extends Model
{
    protected $fillable = ['title', 'user_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function version()
    {
        return $this->hasMany(Version::class);
    }

    public function latestVersion()
    {
        return $this->hasOne(Version::class)->latest();
    }

    public function latest()
    {
        return $this->hasOne(Latest::class);
    }
}

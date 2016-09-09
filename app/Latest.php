<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Latest extends Model
{
    protected $table="latestversion";
    protected $fillable=['entry_id', 'body'];

    public function entry()
    {
        return $this->belongsTo(Entry::class);
    }

    public function version()
    {
        return $this->hasMany(Version::class);
    }


}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use cogpowered\FineDiff\Render\Text;

class Version extends Model
{
    protected $fillable = ['body', 'description', 'entry_id', 'version_id', 'major'];
    public function entry()
    {
        return $this->belongsTo(Entry::class);
    }

    public function latest()
    {
        return $this->hasOne(Latest::class);
    }

    public function saveLatest(Version $version)
    {

        $latest = Latest::firstOrNew([
            'entry_id' => $version->entry_id
        ]);

        if($version->major == 0) {
            $render = new Text;
            $latest->body = $render->process($latest->body, $version->body);
        }

        else {
            $latest->body = $version->body;
        }
        $latest->save();
    }

}

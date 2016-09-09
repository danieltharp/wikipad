<?php

namespace App;

use Faker\Provider\cs_CZ\DateTime;
use Illuminate\Database\Eloquent\Model;
use DB;
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

    public function parseFromLastMajor(Version $newversion)
    {
        $lvmodel = Version::find($newversion->entry_id)->where('major', 1)->first();
        $render = new Text;

        return $render->process($lvmodel->body, $newversion->body);
    }

    public function showLatest($id)
    {

    }

}

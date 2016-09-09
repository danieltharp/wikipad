<?php

namespace App\Http\Controllers;

use App\Version;
use Illuminate\Http\Request;
use App\Latest;

use App\Http\Requests;
use App\Entry;
use Illuminate\Support\Facades\Auth;
use cogpowered\FineDiff\Diff;
use cogpowered\FineDiff\Granularity\Word;
use DB;

    /*
     * @property entry
     */

class VersionsController extends Controller
{

    public function update(Request $request)
    {
        $newrevision = New Version([
            'entry_id' => $request->entry,
            'description' => $request->description
            ]);

        $lastversion = Version::where('entry_id', $request->entry)->orderBy('version_id', 'desc')->first();
        $newrevision->version_id = $lastversion->version_id++;

        $latest = Latest::where('entry_id', $request->entry)->first();

        $granularity = new Word;
        $diff = New Diff($granularity);


        $opcodes = $diff->getOpcodes($latest->body, $request->body);
        if (strlen($opcodes) / strlen($latest->body) > 0.5){
            $newrevision->body = $request->body;
            $newrevision->major = '1';
        }
        else {
            $newrevision->body = $opcodes;
            $newrevision->major = '0';
        }

        $newrevision->save();
        $newrevision->saveLatest($newrevision);
        return redirect()->to('/posts/' . $request->entry);
    }
}

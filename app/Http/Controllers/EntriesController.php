<?php

namespace App\Http\Controllers;

use App\Version;
use App\Latest;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Entry;
use Illuminate\Support\Facades\Auth;
use DB;

class EntriesController extends Controller
{
    public function index()
    {
        $entries = Auth::user()->entries()->latest()->get();
        return view('posts.index', compact('entries'));
    }

    public function write()
    {
        return view('posts.new');
    }

    public function save(Request $request, Entry $entry)
    {
        $newentry = $entry->create([
            'title' => $request->title,
            'user_id' => Auth::id()
        ]);
        $id = $newentry->id; // catch this ephemeral id to redirect later
        $newversion = new Version([
            'body' => $request->body,
            'entry_id' => $entry->id,
            'version_id' => 1,
            'major' => 1,
            'description' => "New Entry"
        ]);
        $newentry->version()->save($newversion)->saveLatest($newversion);
        return redirect()->to('/posts/' . $id);
    }

    public function show(Entry $entry)
    {
        $entry = Entry::with('latest')->find($entry->id);
        return view('posts.show', compact('entry'));
    }
    public function edit(Entry $entry)
    {
        $entry = Entry::with('latest')->find($entry->id);
        return view('posts.edit', compact('entry'));
    }

    public function confirmDelete(Entry $entry)
    {
        return view('posts.delete', compact('entry'));
    }

    public function delete(Entry $entry)
    {
        $entry->version()->delete();
        $entry->latest()->delete();
        $entry->delete();
        return redirect()->to('/posts');
    }

    public function sandbox(Entry $entry)
    {
        $theentries = $entry->version()->get();

        foreach($theentries as $item){
            echo $item;
        }

    }
}

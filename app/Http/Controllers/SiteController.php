<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function index(Request $request)
    {
        $query = Site::where('user_id', Auth::id());

        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->get('search') . '%');
        }

        $sites = $query->get();

        return view('sites.index', compact('sites'));
    }

    public function create(Request $request)
    {
        if ($request->user()->isNot(Auth::user())) {
            return redirect()->route('sites.index');
        }
        return view('sites.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string",
            "url" => "required|string",
            "description" => "required|string",
        ]);

        $site = new Site([
            'name' => $request->get('name'),
            'url' => $request->get('url'),
            'description' => $request->get('description'),
            'user_id' => Auth::id(),
        ]);

        $site->save();

        return redirect()->route('sites');
    }

//    public function show(Site $site)
//    {
//        return redirect()->route('sites');
//    }

    public function edit(Site $site)
    {
        if ($site->user()->isNot(Auth::user())) {
            abort(403);
        }

        return view('sites.edit', compact('site'));
    }

    public function update(Request $request, Site $site)
    {
        $request->validate([
            "name" => "required|string",
            "url" => "required|string",
            "description" => "required|string",
        ]);

        $site->update([
            'name' => $request->get('name'),
            'url' => $request->get('url'),
            'description' => $request->get('description'),
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('sites');
    }

    public function destroy(Site $site)
    {
        $site->delete();
        return redirect()->route('sites');
    }
}

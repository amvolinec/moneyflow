<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Video;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $role = $user->roles->first()->name;
        if ('agent' == $role) {
            $videos = Video::paginate(20);
        } else {
            $videos = Video::where('user_id', $user->id)->paginate(20);
        }
        return view('home', ['role' => $role, 'videos' => $videos]);
    }

    public function show(Request $request, $video_id)
    {
        $videos = Video::where('video_id', $video_id)->get();
        return view('dash.show', ['videos' => $videos]);
    }
}

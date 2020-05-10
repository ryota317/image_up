<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;

use App\Http\Controllers\ImageController;
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


        $title = 'dummy';
        $ans = 'answer';
        $imgController = new ImageController();
        $images   = $imgController->image_get();
        return view('home', ['title' => $title,'ans' => $ans,'imgs' => $images]);
    }
}

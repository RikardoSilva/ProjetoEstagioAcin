<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = 'Welcome to WikiFoot, the Football Wikipedia';
        return view('pages.index')->with('title', $title);
    }

    public function about(){
        $title = 'About';
        return view('pages.about')->with('title', $title);
    }

    public function features(){
        $data = array (
            'title' => 'Soon Features',
            'features' => ['Request to add club', "Request to change club's name/history", 'Add more images to club bio', "Add club's current season players", 'Players and Managers Wiki']
        );
        return view('pages.features')->with($data);
    }
}

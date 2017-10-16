<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
       $title = 'Welcome to '.config('app.name');
	//al method to pass values to page
       //return view('pages.index', compact('title'));
       return view('pages.index')->with('title', $title);
    }

    public function quote(){
       $title = 'Welcome to '.config('app.name');
       return view('pages.quote')->with('title', $title);
    }

    public function services(){
       $data = array(
		       'title' => 'Services',
		       'services' => ['Custom Homes',
              'Custom Concrete',
              'Custom Kitchen and Bath',
              'Construction Management',
              'Excavation',
              'Concrete and Asphalt (structural and paving)',
              'Structural Steel',
              'Interior Finish Out',
              'Ground Up Construction',
              'Demolition'
            ]);
       return view('pages.services')->with($data);
    }

}

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

    public function about(){
       $title = 'Welcome to '.config('app.name');
       return view('pages.about')->with('title', $title);
    }

    public function services(){
       $data = array(
		       'title' => 'Services',
		       'services' => ['Custom Homes',
              'Custom Concrete',
              'Custom Kitchen and Bath',
              'Construction Management',
              'Excavation',
              'Civil Construction (storm & sewer lines and domestic & fire water services)',
              'Concrete and Asphalt (structural and paving)',
              'Structural Steel',
              'Interior Finish Out',
              'Ground Up Construction',
              'Demolition',
              'Time and Material Work – A lot of times there is not time to bid projects due to emergency issues and we will perform all work and track it with daily field tickets.  We have several stime and material contracts were we guarantee our labor and equipment rates for a duration of time and any time that customer needs work completed all they have to do is call and we will schedule work accordingly.',
              '24 hr. Emergency Service – for whatever the case maybe utility leak, power failure, or clean up of natural disaster we will be at your side to fix the problem by any means necessary.']
	     );
       return view('pages.services')->with($data);
    }

}

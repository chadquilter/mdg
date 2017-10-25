<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Address;
use App\User;

class AddressController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function __construct()
      {
        $this->middleware('auth', ['except' => ['index', 'create', 'store']]);
      }

      /**
       * Display a listing of the resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function index()
      {
          //$jobs = Job::all(); get all
          //use db to do custom sql instead
          //$jobs = Job::orderBy('created_at', 'job_desc')->get();
          //$jobs = Job::orderBy('created_at', 'asc')->take(1)->get(); for limit
          return view('address.create');
      }

      /**
       * Show the form for creating a new resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function create()
      {
          return view('address.create');
      }

      /**
       * Store a newly created resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @return \Illuminate\Http\Response
       */
      public function store(Request $request)
      {
          $this->validate($request, [
              'address1' => 'required',
              'address2' => 'required',
              'zipcode' => 'required',
              'state' => 'required',
              'city' => 'required'
          ]);


          $active = ($request->input('active') ? $request->input('active') : 0);
          $long_lat = 1;
          $country = 'US';

          // create address
          $address = new address;
          $address->address1 = $request->input('address1');
          $address->address2 = $request->input('address2');
          $address->zipcode = $request->input('zipcode');
          $address->state = $request->input('state');
          $address->city = $request->input('city');
          $address->code = $long_lat;
          $address->country = $country;
          $address->active = $active;
          $address->save();

          return redirect('/dashboard')->with('success', 'Address Created!');
      }

      /**
       * Display the specified resource.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function show($id)
      {
          $address = address::find($id);
          return view('address.show')->with('address', $address);
      }

      /**
       * Show the form for editing the specified resource.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function edit($id)
      {
          //no users yet...
          $users = User::pluck('name', 'id');

          //////
          $address = address::find($id);
          //check for auth
          if(!auth()->user()->id) {
            return redirect('/login')->with('error', 'Unauthorized Page!');
          }

          //edit view
          return view('address.edit')->with(compact('address', 'users'));
      }

      /**
       * Update the specified resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function update(Request $request, $id)
      {
          //
          $this->validate($request, [
              'address1' => 'required',
              'address2' => 'required',
              'zipcode' => 'required',
              'state' => 'required',
              'city' => 'required'
          ]);


          $active = ($request->input('active') ? $request->input('active') : 0);
          $long_lat = 1;
          $country = 'US';

          // create address
          $address = new address;
          $address->address1 = $request->input('address1');
          $address->address2 = $request->input('address2');
          $address->zipcode = $request->input('zipcode');
          $address->state = $request->input('state');
          $address->city = $request->input('city');
          $address->code = $long_lat;
          $address->country = $country;
          $address->active = $active;
          $address->save();

          return redirect('/dashboard')->with('success', 'Address has been Updated!');
      }

      /**
       * Remove the specified resource from storage.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function destroy($id)
      {

          $address = address::find($id);
          //authorized?
          if(!auth()->user()->id) {
            return redirect('/login')->with('error', 'Unauthorized Page!');
          }

          $address->delete();
          return redirect('/dashboard')->with('success', 'Address Deleted');
      }
}

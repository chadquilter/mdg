<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quote;
use App\User;

class QuotesController extends Controller
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
          return view('quotes.create');
      }

      /**
       * Show the form for creating a new resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function create()
      {
          return view('quotes.create');
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
              'title' => 'required',
              'phone' => 'required',
              'email' => 'required',
              'description' => 'required'
          ]);

          $address = ($request->input('address') ? $request->input('address') : 0);
          $items = ($request->input('items') ? $request->input('items') : 0);
          $jobs = ($request->input('jobs') ? $request->input('jobs') : 0);
          $active = ($request->input('active') ? $request->input('active') : 1);
          $display_web = 1;
          $identifier = 'Filler TEXT';
          $guestimate_amount = '1';
          $current_user = '1';

          // create job
          $quote = new Quote;
          $quote->title = $request->input('title');
          $quote->description = $request->input('description');
          $quote->identifier = $identifier;
          $quote->display_web = $display_web;
          $quote->address = $address;
          $quote->items = $items;
          $quote->jobs = $jobs;
          $quote->active = $active;
          $quote->guestimate_amount = $guestimate_amount;
          $quote->user_id = $current_user;
          $quote->created_by = $current_user;
          $quote->modified_by = $current_user;
          $quote->phone = $request->input('phone');
          $quote->email = $request->input('email');
          $quote->notes = $request->input('notes');
          $quote->save();

          return redirect('/quotes')->with('success', 'Quote Sent! A representitive will contact you with further details.');
      }

      /**
       * Display the specified resource.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function show($id)
      {
          $quote = Quote::find($id);
          return view('quotes.show')->with('quote', $quote);
      }

      /**
       * Show the form for editing the specified resource.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function edit($id)
      {

          $bool_types = array(
              1 => 'Yes',
              0 => 'No');

          $quote_types = array(
              1 => 'Custom Home',
              2 => 'Custom Concrete',
              3 => 'Custom Kitchen and Bath',
              4 => 'Custom Walls',
              5 => 'Distaster Repair');
          //no users yet...
          $users = User::pluck('name', 'id');

          //////
          $quote = Quote::find($id);
          //check for auth
          if(!auth()->user()->id) {
            return redirect('/login')->with('error', 'Unauthorized Page!');
          }

          //edit view
          return view('quotes.edit')->with(compact('users', 'quote'));
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
              'title' => 'required',
              'phone' => 'required',
              'email' => 'required',
              'description' => 'required'
          ]);

          $address = ($request->input('address') ? $request->input('address') : 0);
          $items = ($request->input('items') ? $request->input('items') : 0);
          $jobs = ($request->input('jobs') ? $request->input('jobs') : 0);
          $active = ($request->input('active') ? $request->input('active') : 1);
          $display_web = 1;
          $identifier = 'Filler TEXT';
          $guestimate_amount = '1';
          $current_user = auth()->user()->id;

          // create job
          $quote = new Quote;
          $quote->title = $request->input('title');
          $quote->description = $request->input('description');
          $quote->identifier = $identifier;
          $quote->display_web = $display_web;
          $quote->address = $address;
          $quote->items = $items;
          $quote->jobs = $jobs;
          $quote->active = $active;
          $quote->guestimate_amount = $guestimate_amount;
          $quote->user_id = $current_user;
          $quote->created_by = $current_user;
          $quote->modified_by = $current_user;
          $quote->phone = $request->input('phone');
          $quote->email = $request->input('email');
          $quote->notes = $request->input('notes');
          $quote->save();

          return redirect('/dashboard')->with('success', 'Quote has been Updated');
      }

      /**
       * Remove the specified resource from storage.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function destroy($id)
      {

          $quote = Quote::find($id);
          //authorized?
          if(!auth()->user()->id) {
            return redirect('/login')->with('error', 'Unauthorized Page!');
          }

          $quote->delete();
          return redirect('/dashboard')->with('success', 'Quote Deleted');
      }
}

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
        $this->middleware('auth', ['except' => ['create']]);
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

          $bool_types = array(
              1 => 'Yes',
              0 => 'No');

          $users = User::pluck('name', 'id');
          $current_user = auth()->user()->id;

          return view('quote.create')
              ->with(compact('bool_types', 'users', 'current_user'));
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
          $identifier = 'Filler TEXT';

          // create job
          $quote = new Quote;
          $quote->title = $request->input('title');
          $quote->description = $request->input('description');
          $quote->identifier = $identifier;
          $quote->display_web = $request->input('display_web');
          $quote->address = $address;
          $quote->items = $items;
          $quote->jobs = $jobs;
          $quote->active = $active;
          $quote->phone = $request->input('phone');
          $quote->email = $request->input('email');
          $quote->notes = $request->input('notes');
          $quote->save();

          return redirect('/quote')->with('success', 'Quote Created');

      }

      /**
       * Display the specified resource.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function show($id)
      {
          $job = Job::find($id);
          return view('jobs.show')->with('job', $job);
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
          $quote = Qote::find($id);
          //check for auth
          if(auth()->user()->id) {
            return redirect('/quote')->with('error', 'Unauthorized Page!');
          }

          //edit view
          return view('quotes.edit')->with(compact('users'));
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
              'summary' => 'required'
              //'cover_image' => 'image|nullable|max:1999'
          ]);

  /**
  *        if($request->hasFile('cover_image')){
  *          $filenameWithExt = $request->file('cover_image')->getClientOriginalImage();
  *          //get just filenameWithExt
  *          $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
  *          //file PATHINFO_FILENAM
  *          $extension = $request->file('cover_image')->getOriginalClientExtension();
  *          //file to store
  *          $filenNameToStore= $filename.'_'.time().'.'.$extension;
  *          //upload
  *          $path = $request->file('cover_image')->sotreAs('public/cover_image', $filenNameToStore);
  *        }
  */
          // create quote
          $quote = Qote::find($id);
          $quote->quote_title = $request->input('quote_title');
          $quote->quote_type = $request->input('quote_type');
          $quote->quote_summary = $request->input('quote_summary');
          $quote->quote_notes = $request->input('quote_notes');
          $quote->quote_status = $request->input('quote_status');
          $quote->quote_modified_by = $request->input('quote_created_by');
          $quote->quote_created_by = $request->input('quote_created_by');
          $quote->user_id = $request->input('quote_created_by');
          $quote->quote_media = $request->input('quote_media');
          $quote->quote_display = $request->input('quote_display');
          $quote->quote_account = $request->input('quote_account');
          $quote->quote_address = $request->input('quote_address');
          $quote->quote_certs = $request->input('quote_certs');
          $quote->quote_quote = $request->input('quote_quote');
          $quote->quote_reciepts = $request->input('quote_reciepts');
          $quote->quote_invoiced = $request->input('quote_invoiced');
          $quote->quote_quote = $request->input('quote_quote');
          $quote->save();

          return redirect('/quote')->with('success', 'Job Updated');
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
          if(auth()->user()->id !==$quote->user_id) {
            return redirect('/login')->with('error', 'Unauthorized Page!');
          }

          $quote->delete();
          return redirect('/dashboard')->with('success', 'Quote Deleted');
      }
}

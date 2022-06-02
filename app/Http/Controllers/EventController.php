<?php

namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;

//use Illuminate\Http\Request;

class EventController extends Controller
{


    public function index()
{
$data['companies'] = Event::orderBy('id','asc')->paginate(5);
return view('index', $data);
}

public function create()
{
return view('create');
}

public function store(Request $request)
{
   // dd($request);
$request->validate([
'name' => 'required',
'slug' => 'required',

]);
$company = new Event;
$company->name = $request->name;
$company->slug = $request->slug;

$company->save();
return redirect()->route('index')
->with('success','Company has been created successfully.');
}

public function show(Event $company)
{
return view('show',compact('company'));
} 

public function edit(Event $company)
{
return view('edit',compact('company'));
}

public function update(Request $request, $id)
{
$request->validate([
'name' => 'required',
'slug' => 'required',
'address' => 'required',
]);
$company = Event::find($id);
$company->name = $request->name;
$company->slug = $request->slug;
$company->save();
return redirect()->route('index')
->with('success','Event Has Been updated successfully');
}


public function destroy(Company $company)
{
$company->delete();
return redirect()->route('index')
->with('success','Company has been deleted successfully');
}



}

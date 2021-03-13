<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Movie;
use File;
class MovieController extends Controller
{
    public function index(){
    	$movie= Movie::all();
    	return view('admin.movie.movie',['movie'=>$movie]);
    }
    public function add(){
    	return view('admin.movie.add');
    }
    public function store(Request $req){
    	$req->validate([
    		'file'=>'required|file|image|mimes:jpeg,png,jpg'
    	]);
    	$file = $req->file('file');
    	$nama_file = time()."_".$file->getClientOriginalName();
    	$location = 'image';
    	$file->move($location,$nama_file);
    	Movie::create([
    		'name'=>$req->name,
    		'minute_lenght'=>$req->minute,
    		'picture_url'=>$nama_file
    	]);
    	return redirect()->route('admin.movie')->with('status','Data has been added');
    }
    public function edit($id){
    	$movie= Movie::findOrFail($id);
    	return view('admin.movie.edit',['movie'=>$movie]);
    }
    public function update($id,Request $req){
    	$req->validate([
    		'file'=>'required|file|image|mimes:jpeg,png,jpg'
    	]);
    	$file = $req->file('file');
    	$nama_file = time()."_".$file->getClientOriginalName();
    	$location = 'image';
    	$file->move($location,$nama_file);
    	$movie = Movie::findOrFail($id);
    	$movie->name = $req->name;
    	$movie->minute_lenght = $req->minute;
    	$movie->picture_url=$nama_file;
    	$movie->save();
    	return redirect()->route('admin.movie')->with('status','Data has been edited');
    }
    public function delete($id){
    	$movie = Movie::findOrFail($id);
    	File::delete('image/'.$movie->picture_url);
    	Movie::destroy($id);
    	return redirect()->route('admin.movie')->with('status','Data has been deleted');
    }
}

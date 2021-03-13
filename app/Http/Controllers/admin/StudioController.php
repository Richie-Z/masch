<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Branch;
use App\Studio;
class StudioController extends Controller
{
    public function index(){
    	$studio = DB::table('studios')
    			->join('branches','branches.id','=','studios.branches_id')
    			->select('studios.*','branches.name_branch')
    			->get();
    	return view ('admin.studio.studio',['studio'=>$studio]);
    }
    public function add(){
    	$studio = Branch::all();
    	return view ('admin.studio.add',['studio'=>$studio]);
    }
    public function store(Request $req){
    	$req->validate([
    		'name'=>'required|min:5',
    		'basic'=>'required',
    		'friday'=>'required',
    		'saturday'=>'required',
    		'sunday'=>'required']);
    	Studio::create([
    		'name'=> $req->name,
    		'branches_id'=>$req->branch,
    		'basic_price'=>$req->basic,
    		'aditional_friday_price'=>$req->friday,
    		'aditional_saturday_price'=>$req->saturday,
    		'aditional_sunday_price'=>$req->sunday]);
    	return redirect()->route('admin.studio')->with('status','Data has been added');
    }
    public function edit($id){
    	$studio = DB::table('studios')
    			->join('branches','branches.id','=','studios.branches_id')
    			->select('studios.*','branches.name_branch')
    			->where('studios.id',$id)
    			->first();
    	$branch = Branch::all();
    	$data = array(
    		'studio' =>$studio,
    		'branch' =>$branch
    	);
    	return view ('admin.studio.edit',$data);
    }
    public function update($id, Request $req){
        $req->validate([
            'name'=>'required|min:5',
            'basic'=>'required',
            'friday'=>'required',
            'saturday'=>'required',
            'sunday'=>'required'
        ]);
        $studio = Studio::findOrFail($id);
        $studio->name = $req->name;
        $studio->branches_id = $req->branch;
        $studio->basic_price = $req->basic;
        $studio->aditional_friday_price = $req->friday;
        $studio->aditional_saturday_price = $req->saturday;
        $studio->aditional_sunday_price = $req->sunday;
        $studio->save();
        return redirect()->route('admin.studio')->with('status','Data has been editted');
    }
    public function delete($id){
    	$studio = Studio::findOrFail($id);
    	Studio::destroy($id);
    	return redirect()->route('admin.studio')->with('status','Data has been deleted');
    }
}

<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Branch;
class BranchController extends Controller
{
    public function index(){
    	$branch= Branch::all();
    	return view('admin.branch.branch', ['branch' => $branch]);
    }
    public function add(){
    	return view ('admin.branch.add');
    }
    public function store(Request $req){
    	$this->validate($req,[
    		'name'=>'required']);
    	Branch::create([
    		'name_branch'=> $req->name]);
    	return redirect()->route('admin.branch')->with('status','Data has been added');
    }
    public function edit($id){
    	$branch = Branch::findOrFail($id);
    	return view('admin.branch.edit',['branch'=>$branch]);
    }
    public function update($id,Request $req){
    	$this->validate($req,[
    		'name'=>'required']);
    	$branch = Branch::findOrFail($id);
    	$branch->name_branch = $req->name;
    	$branch->save();
    	return redirect()->route('admin.branch')->with('status','Data has been edited');
    }
    public function delete($id){
    	$branch = Branch::findOrFail($id);
    	Branch::destroy($id);
    	return redirect()->route('admin.branch')->with('status','Data has been deleted');
    }
}

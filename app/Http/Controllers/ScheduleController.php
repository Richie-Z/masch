<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Schedule;
use App\Movie;
use App\Studio;
use App\Branch;

class ScheduleController extends Controller
{
	public function index(){
		$schedule = DB::table('schedules')
		->join('movies','movies.id','=','schedules.movies_id')	
		->join('studios','studios.id','=','schedules.studios_id')
		->select('schedules.*','movies.name as movie_name','studios.name as studio_name')
		->get();
		return view('schedule.admin.schedule',['schedule'=>$schedule]);
	}
	public function add(){
		$studio = Studio::all();
		$movie = Movie::all();
		$data = array(
			'studio'=>$studio,
			'movie' =>$movie
		);
		return view('schedule.admin.add',$data);
	}
	public function store(Request $req){
		//end
		$start_time= date('H:i:s',strtotime($req->start));
		$year = date('Y-m-d' ,strtotime($req->start));
		$movie = $req->movie;
		$movies = Movie::find($movie);
		function convertToHoursMins($time, $format = '%02d:%02d') {
			if ($time < 1) {
				return;
			}
			$hours = floor($time / 60);
			$minutes = ($time % 60);
			return sprintf($format, $hours, $minutes);
		}
		$lenght = convertToHoursMins($movies->minute_lenght, '%02d:%02d');
		$plus = strtotime($start_time)+strtotime($lenght);
		$plus = date('H:i:s',$plus);
		$timing = date('Y-m-d',strtotime($year)) ."T". $plus;
		//price
		$day = date('D',strtotime($year));
		$studio = $req->studio;
		$studios = Studio::find($studio);
		if ($day== 'Fri') {
			$price = $studios->basic_price+$studios->aditional_friday_price;
		}elseif ($day== 'Sat') {
			$price = $studios->basic_price+$studios->aditional_saturday_price;
		}elseif ($day== 'Sun') {
			$price = $studios->basic_price+$studios->aditional_sunday_price;
		}else{
			$price = $studios->basic_price;
		}
		Schedule::create([
			'movies_id' => $movie,
			'studios_id' => $studio,
			'start' => $req->start,
			'end'=> $timing,
			'price' => $price
		]);
		return redirect()->route('admin.schedule')->with('status','Data has been added');
	}
	public function edit($id){
		$schedule = DB::table('schedules')
		->join('movies','movies.id','=','schedules.movies_id')	
		->join('studios','studios.id','=','schedules.studios_id')
		->select('schedules.*','movies.name as movie_name','studios.name as studio_name')
		->where('schedules.id',$id)
		->first();
		$studio = Studio::all();
		$movie = Movie::all();
		$data = array(
			'studio'=>$studio,
			'movie' =>$movie,
			'schedule' =>$schedule
		);
		return view('schedule.admin.edit',$data);
	}
	public function update($id,Request $req){
		$schedule=Schedule::findOrFail($id);
		$start_time= date('H:i:s',strtotime($req->start));
		$year = date('Y-m-d' ,strtotime($req->start));
		$movie = $req->movie;
		$movies = Movie::find($movie);
		function convertToHoursMins($time, $format = '%02d:%02d') {
			if ($time < 1) {
				return;
			}
			$hours = floor($time / 60);
			$minutes = ($time % 60);
			return sprintf($format, $hours, $minutes);
		}
		$lenght = convertToHoursMins($movies->minute_lenght, '%02d:%02d');
		$plus = strtotime($start_time)+strtotime($lenght);
		$plus = date('H:i:s',$plus);
		$timing = date('Y-m-d',strtotime($year)) ."T". $plus;
		//price
		$day = date('D',strtotime($year));
		$studio = $req->studio;
		$studios = Studio::find($studio);
		if ($day== 'Fri') {
			$price = $studios->basic_price+$studios->aditional_friday_price;
		}elseif ($day== 'Sat') {
			$price = $studios->basic_price+$studios->aditional_saturday_price;
		}elseif ($day== 'Sun') {
			$price = $studios->basic_price+$studios->aditional_sunday_price;
		}else{
			$price = $studios->basic_price;
		}
		$schedule->movies_id=$movie;
		$schedule->studios_id=$studio;
		$schedule->start=$req->start;
		$schedule->end=$timing;
		$schedule->price=$price;
		$schedule->save();
		return redirect()->route('admin.schedule')->with('status','Data has been edited');
	}
	public function delete($id){
		$schedule = Schedule::findOrFail($id);
		Schedule::destroy($id);
		return redirect()->route('admin.schedule')->with('status','Data has been deleted');
	}
	public function user(){
		$schedule= DB::table('schedules')
		->join('movies','movies.id','=','schedules.movies_id')
		->select('schedules.*','movies.name as movie_name')
		->orderBy('movies.name','asc')
		->orderBy('price','asc')
		->get();
		$branch=Branch::all();
		$data=array(
			'schedule'=>$schedule,
			'branch'=>$branch);
		return view('schedule.schedule',$data);
	}
	public function filter(Request $req){
		$branch = $req->branch;
		$date = $req->date;
		$schedule=DB::table('schedules')
		->join('movies','movies.id','=','schedules.movies_id')
		->select('schedules.*','movies.name as movie_name')
		->whereDate('schedules.start',$date)
		->where('studios_id','like',"%".$branch."%")
		->orderBy('movies.name','asc')
		->orderBy('price','asc')
		->get();
		$branch=Branch::all();
		$data=array(
			'schedule'=>$schedule,
			'branch'=>$branch);
		return view('schedule.schedule',$data);
	}
}

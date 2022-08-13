<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PageController extends Controller
{
    public function index(){
        $jobs = Jobs::orderBy('updated_at', 'DESC')->with('User')->paginate(6);
        return view('welcome',compact('jobs'));
    }

    public function jobshow(){

            $jobs = Jobs::orderBy('updated_at', 'DESC')->get();

            return view('dashboard', compact('jobs'));

    }

    public function show($slug){
        $job = Jobs::where('slug',$slug)->first();
        return view('job-show',compact('job'));
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }


}

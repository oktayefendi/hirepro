<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Jobs::where('user_id', auth()->user()->id)->orderBy('updated_at', 'DESC')->paginate(5);
        return view('post.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required',
        ]);


        Jobs::create([
            'title' => $request->title,
            'price' => $request->price,
            'slug' => Str::slug($request->title),
            'body' => $request->body,
            'category_id' => $request->category_id,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->back()->with('messages', 'Post has been created successfully!');
    }


    public function catshow(){


        $job_category = DB::table('job_categories')->get();

        return view('post.create', ['job_category' => $job_category]);

}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $post = Jobs::where('slug', $slug)->first();
        return view('post.edit',compact('jobs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $post = Jobs::where('slug',$slug)->first();


        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->body = $request->body;
        $post->user_id = auth()->user()->id;
        $post->update();

        return redirect()->route('index')->with('messages', 'Post has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jobs = Jobs::where('id',$id)->first();
        $jobs->delete();

        return redirect()->route('index')->with('messages', 'Post has been deleted successfully!');
    }
}

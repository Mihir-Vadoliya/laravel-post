<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\postRequest;
use File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Post::get();
        return view('admin.post.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(postRequest $request)
    {
        $validated = $request->validated();

        if ($validated){
            $file = $request->image;
            $path = public_path().'/postImages/';
            $imgName = $file->getClientOriginalName();
            $file->move($path, $imgName);

            $data = [
                'title' => $request->title,
                'description' => $request->description,
                'image' => $imgName
            ];

            $data = Post::create($data);

            return redirect()->route('posts.index')->with(['success' => 'Post Added Successfully.']);
        }else{
            return redirect()->back()->withErrors($validated);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Post::find($id);
        return view('admin.post.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(postEditRequest $request, $id)
    {

        $validated = $request->validated();

        if ($validated){

            if(!empty($request->image)){
                $path = public_path().'/postImages/';
                $getOldImage = Post::whereId($id)->first('image');
                $oldImagePath = $path.$getOldImage['image'];

                if(File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
                $file = $request->image;
                $imgName = $file->getClientOriginalName();
                $file->move($path, $imgName);

                $data = Post::whereId($id)->update([
                    'image' => $imgName
                ]);
            }

            $data = [
                'title' => $request->title,
                'description' => $request->description
            ];

            $data = Post::whereId($id)->update($data);

            return redirect()->route('posts.index')->with(['success' => 'Post Update Successfully.']);
        }else{
            return redirect()->back()->withErrors($validated);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Post::whereId($id)->delete();

        if ($delete){
            return redirect()->route('posts.index')->with(['success' => 'Post Deleted Successfully.']);
        }else{
            return redirect()->route('posts.index')->with(['error' => 'Post Not Deleted']);
        }
    }
}

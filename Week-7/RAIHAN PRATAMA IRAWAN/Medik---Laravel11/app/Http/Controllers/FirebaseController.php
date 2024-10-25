<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Database;

class FirebaseController extends Controller
{
    public function index(){
        $database = app('firebase.database');
        $posts = $database->getReference('posts')->getValue();

        return view('posts.index', compact('posts'));
    }
    public function create()
    {
        return view('posts.create');
    }
    public function store(Request $request)
    {
        $database = app('firebase.database');
        $newPost = $database->getReferenced('posts')
        ->push([
            'title' => $request->input('title'),
            'body'=> $request->input('body'),
        ]);

        return redirect('/posts')->with('success', 'Post created successfully!');
    }
    public function edit($id)
    {

        $database = app('firebase.database');
        $post = $database->getReference('posts/' . $id)->getValue();


        return view('posts.edit', compact('post','id'));
    }

    public function update(Request $request, $id)
    {
        $database = app('firebase.database');
        $database->getReference('posts/' . $id)
        ->update([
            'title' => $request->input('title'),
            'body'=> $request->input('body'),
        ]);

        return redirect('/posts')->with('success','Post updated succesfully!');
    }

    public function destroy($id)
    {
        $database = app('firebase.database');
        $database->getReference('/posts'. $id)->remove();

        return redirect('/posts')->with('success','Post deleted succesfully!');
    }
}

<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Database;

class FirebaseController extends Controller
{
    public function index()
    {
        // Get all posts from database
        $database = app('firebase.database');
        $posts = $database->getReference('posts')->getValue();

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        // Show the form to create a new post
        return view('posts.create');
    }

    public function store(Request $request)
    {
        // Store new post in database
        $database = app('firebase.database');
        $newPost = $database->getReference('posts')
            ->push([
                'title' => $request->input('title'),
                'body' => $request->input('body'),
            ]);

        return redirect('/posts')->with('success', 'Post created successfully!');
    }

    public function edit($id)
    {
        // Get the specific post by ID
        $database = app('firebase.database');
        $post = $database->getReference('posts/' . $id)->getValue();

        return view('posts.edit', compact('post', 'id'));
    }

    public function update(Request $request, $id)
    {
        // Update the specific post by ID
        $database = app('firebase.database');
        $database->getReference('posts/' . $id)
            ->update([
                'title' => $request->input('title'),
                'body' => $request->input('body'),
            ]);

        return redirect('/posts')->with('success', 'Post updated successfully!');
    }

    public function destroy($id)
    {
        // Delete the specific post by ID
        $database = app('firebase.database');
        $database->getReference('posts/' . $id)->remove();

        return redirect('/posts')->with('success', 'Post deleted successfully!');
    }
}
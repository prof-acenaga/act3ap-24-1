<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(10);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('posts.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'user_id' => 'required',
            'main_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $post = Post::create($request->all());
        if ($request->hasFile('main_image')) {
            $post->main_image = $request->file('main_image')->store('posts', 'public');
        } else {
            $post->main_image = null;
        }
        $post->save();

        return back()->with('status', 'El post se ha creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        $users = User::all();
        return view('posts.edit', compact('post', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $post->update($request->all());

        //imagen
        if ($request->file('main_image')) {
            Storage::disk('public')->delete($post->main_image);
            $post->main_image = $request->file('main_image')->store('posts', 'public');
            $post->save();
        }
        //retornar
        return redirect()->route('posts.index')
            ->with('status', 'El post se ha actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        Storage::disk('public')->delete($post->main_image);
        $post->delete();

        return redirect()->route('posts.index')
        ->with('status', 'Eliminado con exito');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class PostController extends Controller
{
    public function index()
    {
        $posts = DB::select('select * from posts');
        return view('posts.index', ['posts' => $posts]);
    }

    public function create() {
        return view('posts.create');
    }

    public function store(Request $request) {
        $title = $request->input('title');
        $content = $request->input('content');
        DB::insert('insert into posts (title, content) values (?, ?)', [$title, $content]);
        return redirect('/post');
    }

    public function show($id) {
        $post = DB::select('select * from posts where id = ?', [$id]);
        return view('posts.show', ['post' => $post]);
    }


    public function edit($id) {
        $post = DB::select('select * from posts where id = ?', [$id]);
        return view('posts.edit', ['post' => $post]);
    }

    public function update(Request $request, $id) {
        $title = $request->input('title');
        $content = $request->input('content');
        DB::update('update posts set title = ?, content = ? where id = ?', [$title, $content, $id]);
        return redirect('/post');
    }

    public function delete($id) {
        DB::delete('delete from posts where id = ?', [$id]);
        return redirect('/post');
    }


}

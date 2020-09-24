<?php

namespace App\Http\Controllers;

use App\Post;
use App\Categoy;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use function GuzzleHttp\Psr7\str;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Affiche l'accueil
     */
    public function index()
    {
        $posts = Post::all();
        // dd($posts);
        return view('home')
            ->with('posts',$posts);
    }

    public function details($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('detailsPost')
            ->with('post',$post);
    }

    public function listPosts()
    {
        $categories = Categoy::all();
        $posts = Post::orderBy('updated_at','desc')->get();
        return view('listPosts')
            ->with([
                'posts'=>$posts,
                'categories'=>$categories,
            ]);
    }

    public function store(StorePostRequest $request)
    {
        $params = $request->validated();
        $params['slug'] = Str::slug($params['name'],'-');

        Storage::put('public/posts',$params['image']);
        $params['image'] = 'posts/' . $params['image']->hashName();

        $params['user_id'] = Auth::user()->id;

        Post::create($params);
        return redirect()->route('posts');
    }

    public function change($id)
    {
        $post = Post::findOrFail($id);
        $categories = Categoy::all();
        return view('changePost')->with([
            'post'=>$post,
            'categories'=>$categories,
        ]);
    }

    public function update(UpdatePostRequest $request, $id)
    {
        $params = $request->validated();
        $post = Post::findOrFail($id);
        $params['image'] = isset($params['image']) ? $params['image'] : null;

        $isImage = $params['image'];
        $params['image'] = $post->image;
   
        if($isImage !== null)
        {
            Storage::delete('public/' . $post->image);

            Storage::put('public/posts',$isImage);
            $params['image'] = 'posts/' . $isImage->hashName();
        }

        $post->update($params);
        return redirect()->route('posts');
    }

    public function add()
    {
        $categories = Categoy::all();
        return view('addPost')->with('categories', $categories);
    }

    public function remove($id)
    {
        $post = Post::findOrFail($id);

        Storage::delete('public/' . $post->image);

        $post->delete();
        return redirect()->route('posts');
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CardResource;
use App\Models\Post;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function index()
    {
        $cardresource = Post::paginate(3);
        return response()->json($cardresource);
    }

    public function show($id)
    {
        $post = Post::find($id);
        return response()->json($post);
    }

    public function psyco($categoryid)
    {
        $hamham = Post::where('category_name', $categoryid)->paginate(3);
        return response()->json($hamham);
    }
}
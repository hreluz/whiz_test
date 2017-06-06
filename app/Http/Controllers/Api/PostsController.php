<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class PostsController extends Controller
{

	public function create(Request $request)
	{
		$this->validate($request,[
			'title' => 'required',
			'content' => 'required'
		]);

		$post = Post::create($request->all());
		$response = $post->save();

		$message = $response ? 'Post was created succesfully' : 'There was a problem. Try again';

		return [
			'result' => $response,
			'message' => $message
		];
	}
}

<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Http\JsonResponse;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        // $posts = Post::query()->where('id', '=', '1')->get();
        $posts = Post::query()->get();
        return new JsonResponse([
            'data' => $posts
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonReponse
     */
    public function store(Request $request)
    {

        $created = Post::query()->create([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return new JsonResponse([
            'data' => $created
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonReponse
     */
    public function show(Post $post)
    {
        return new JsonResponse([
            'data' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Post  $post
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonReponse
     */
    public function update(Request $request, Post $post)
    {
        // $post->update($request->only(['title', 'body']));
        $updated = $post->update([
            'title' => $request->title ?? $post->title,
            'body' => $request->body ?? $post->body
        ]);
        if (!$updated) {
            return new JsonResponse([
                'errors' => [
                    'Failed to update the model'
                ]
            ], 400);
        };
        return new JsonResponse([
            'data' => $post
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonReponse
     */
    public function destroy(Post $post)
    {
        $deleted = $post->forceDelete();

        if (!$deleted) {
            return new JsonResponse([
                'errors' => [
                    'Could not delete resource.'
                ]
            ], 400);
        };
        return new JsonResponse([
            'data' => 'success'
        ]);
    }
}

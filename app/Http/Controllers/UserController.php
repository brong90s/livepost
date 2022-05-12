<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new \Illuminate\Http\JsonResponse([
            'data' => 'aaaa'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     * @return \Illuminate\Http\Request
     */
    public function store(Request $request)
    {
        return new \Illuminate\Http\JsonResponse([
            'data' => 'posted'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return new \Illuminate\Http\JsonResponse([
            'data' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        return new \Illuminate\Http\JsonResponse([
            'data' => 'patch'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        return new \Illuminate\Http\JsonResponse([
            'data' => 'deleted'
        ]);
    }
}

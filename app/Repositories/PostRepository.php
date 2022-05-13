<?php

namespace App\Repositories;

use App\Exceptions\GeneralJsonException;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostRepository extends BaseRepository
{
  public function create(array $attributes)
  {
    return DB::transaction(function () use ($attributes) {

      $created = Post::query()->create([
        'title' => data_get($attributes, 'title', 'Untitled'),
        'body' => data_get($attributes, 'body'),
      ]);

      throw_if(!$created, GeneralJsonException::class, 'Failed to create.');

      // associate newly created post with some existing users
      if ($userIds = data_get($attributes, 'user_ids')) {
        $created->users()->sync($userIds);
      }

      return $created;
    });
  }

  public function update($post, array $attributes)
  {
    return DB::transaction(function () use ($post, $attributes) {
      // $post->update($request->only(['title', 'body']));
      $updated = $post->update([
        'title' => data_get($attributes, 'title', $post->title),
        'body' => data_get($attributes, 'body', $post->body)
      ]);

      throw_if(!$updated, GeneralJsonException::class, 'Failed to update post.');

      if ($userIds = data_get($attributes, 'user_ids')) {
        $post->users()->sync($userIds);
      }

      return $post;
    });
  }

  public function forceDelete($post)
  {

    return DB::transaction(function () use ($post) {
      $deleted = $post->forceDelete();

      throw_if(!$deleted, GeneralJsonException::class, 'Cannot delete the post.');

      return $deleted;
    });
  }
}

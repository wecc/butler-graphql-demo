<?php

namespace App\Http\Graphql\Types;

use App\Post;
use App\User as UserModel;

class User
{
    public function username(UserModel $user)
    {
        return $user->email;
    }

    public function createdAt(UserModel $user, $args)
    {
        switch ($args['format']) {
            case 'RFC3339':
                return $user->created_at->toRfc3339String();
                break;
            case 'RSS':
                return $user->created_at->toRssString();
                break;
        }
    }

    public function posts(UserModel $user, $args, $context, $fieldInfo)
    {
        return $context['loader'](function ($ids) {

            $postsByUserId = Post::whereIn('user_id', $ids)->get()->groupBy('user_id');

            return collect($ids)->map(function ($id) use ($postsByUserId) {
                return $postsByUserId->get($id) ?? [];
            });

        })->load($user->id);
    }
}

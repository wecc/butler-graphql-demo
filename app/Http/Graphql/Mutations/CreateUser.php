<?php

namespace App\Http\Graphql\Mutations;

use App\User;

class CreateUser
{
    public function __invoke($root, $args)
    {
        $input = validator($args, [
            'email' => 'required|email',
            'name' => 'required|string',
            'password' => 'required',
        ])->validate();

        return User::create($input);


        // return User::all();
    }
}

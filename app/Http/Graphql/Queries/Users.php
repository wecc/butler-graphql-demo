<?php

namespace App\Http\Graphql\Queries;

use App\User;

class Users
{
    public function __invoke()
    {
        return User::all();
    }
}

<?php

namespace App\Http\Graphql\Queries;

class Ping
{
    public function __invoke()
    {
        return (object) ['message_of_the_day' => 'Hello!'];
    }
}

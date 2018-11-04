<?php

namespace App\Http\Graphql\Types;

class PingThing
{
    public function messageOfTheDay($source)
    {
        return strrev($source->message_of_the_day);
    }
}

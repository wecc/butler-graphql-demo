<?php

namespace App\Http\Controllers;

use Butler\Graphql\Concerns\HandlesGraphqlRequests;
use Illuminate\Http\Request;

class GraphqlController extends Controller
{
    use HandlesGraphqlRequests;
}

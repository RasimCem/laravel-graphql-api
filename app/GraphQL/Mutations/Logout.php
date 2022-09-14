<?php

namespace App\GraphQL\Mutations;

use Illuminate\Support\Facades\Auth;

final class Logout
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        auth('sanctum')->user()->tokens()->delete();

        return response()->json([
            'message' => 'Logged out.'
        ]);
    }
}

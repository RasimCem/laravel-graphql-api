<?php

namespace App\GraphQL\Mutations;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

final class Login
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        if (Auth::attempt(['email' => $args['email'], 'password' => $args['password']])){
            $user = User::where('email', $args['email'])->first();

            return $user->createToken('graphql-api-example')->plainTextToken;
        }

        throw ValidationException::withMessages([
            'email' => ['User not found!'],
        ]);
    }
}

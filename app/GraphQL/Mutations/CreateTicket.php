<?php

namespace App\GraphQL\Mutations;

use App\Models\Ticket;
use App\Models\User;

final class CreateTicket
{
    /**
     * @param null $_
     * @param array{} $args
     */
    public function __invoke($_, array $args)
    {
        $file = $args['file'];
        $path = $file->storePublicly('public/ticket-uploads');

        return Ticket::create([
            'user_id' => User::first()->id,
            'title' => $args['title'],
            'description' => $args['description'],
            'image_path' => $path
        ]);
    }
}

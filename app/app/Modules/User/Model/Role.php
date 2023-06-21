<?php

namespace App\Modules\User\Model;

enum Role: string
{
    case ADMIN = 'admin';

    case MODERATOR = 'moderator';

    case USER = 'user';
}

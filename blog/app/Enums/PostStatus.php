<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

//Used for the posts while storing or getting from databse
final class PostStatus extends Enum
{
    const Active = 'active';
    const Draft = 'draft';
    const Pending = 'pending';
}

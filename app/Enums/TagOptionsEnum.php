<?php

namespace App\Enums;

class TagOptionsEnum
{
    const CAT = 'Cat';
    const DOG = 'Dog';
    const BUNNY = 'Bunny';

    public static function getValues(): array
    {
        return [
            self::CAT,
            self::DOG,
            self::BUNNY,
        ];
    }
}

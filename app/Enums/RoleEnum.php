<?php

namespace App\Enums;

enum RoleEnum: string
{
    case PURCHASER = 'purchaser';
    case RAWMAT = 'rawmat';
    case SUPPLY = 'supply';
    case SUPERADMIN = 'superadmin';

    // Optional helper: a friendly display label for each role
    public function label(): string
    {
        return match ($this) {
            static::PURCHASER => 'Purchase Personnel',
            static::RAWMAT => 'Raw Material Personnel',
            static::SUPERADMIN => 'User Administrator',
            static::SUPPLY => 'Supply Personnel',
        };
    }
}
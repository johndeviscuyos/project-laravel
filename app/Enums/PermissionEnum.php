<?php

namespace App\Enums;

enum PermissionEnum: string
{
    case EDIT_ARTICLES = 'edit articles';
    case APPROVE_REQUEST_SLIP = 'approve request slip';

    public function label(): string
    {
        return match ($this) {
            static::EDIT_ARTICLES => 'Edit Articles',
            static::APPROVE_REQUEST_SLIP => 'Approve Request Slip',
        };
    }
}
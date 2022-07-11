<?php
namespace App\Factories;

use App\Models\Appeal;

class AppealFactory
{
    public static function create (array $data) {
        return new Appeal($data);
    }
}
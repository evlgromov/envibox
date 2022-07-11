<?php

namespace App\Http\Repositories;

use App\Models\Appeal;

class DBAppealRepository implements AppealRepositoryInterface 
{
    public function save(Appeal $appeal) {
        $appeal->save();
    }
}
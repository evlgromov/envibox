<?php

namespace App\Http\Repositories;

use App\Models\Appeal;

interface AppealRepositoryInterface {

    public function save(Appeal $appeal);
    
}

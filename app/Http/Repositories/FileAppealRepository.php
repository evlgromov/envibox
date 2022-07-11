<?php
namespace App\Http\Repositories;

use App\Models\Appeal;
use App\Http\Repositories\AppealRepositoryInterface;

class FileAppealRepository implements AppealRepositoryInterface
{
    public function save(Appeal $appeal) {
        $path = storage_path('app/public/');

        $fileName = 'data.csv';
    
        $file = fopen($path.$fileName, 'w');
    
        fwrite($file, implode(',', $appeal->toArray()).PHP_EOL);

        fclose($file);
    }
}
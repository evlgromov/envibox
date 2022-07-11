<?php

namespace App\Http\Controllers\Api;

use App\Factories\AppealFactory;
use App\Http\Controllers\Controller;
use App\Http\Requests\AppealRequest;
use App\Http\Repositories\DBAppealRepository;
use App\Http\Repositories\FileAppealRepository;

class AppealController extends Controller
{
    public function __construct(DBAppealRepository $appealRepository)
    {
        $this->repository = $appealRepository;
    }

    public function store(AppealRequest $request)
    {
        try {            
            $appeal = AppealFactory::create($request->validated());
            $this->repository->save($appeal);
    
            return response()->json([
                'message' => 'Ваше обращение зарегистрировано!',
                'error' => false
            ], 201);
        } catch(\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'error' => true
            ], 500);
        }
    }
}

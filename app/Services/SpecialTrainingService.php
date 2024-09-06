<?php

namespace App\Services;

use App\Models\SpecialTraining;
use Illuminate\Support\Facades\Auth;

class SpecialTrainingService
{
    public function storeOrUpdateSpecialTraining(array $data, int $userId): SpecialTraining
    {
        $specialTraining = SpecialTraining::updateOrCreate(
            ['user_id' => $userId],
            $data
        );

        return $specialTraining;
    }
}
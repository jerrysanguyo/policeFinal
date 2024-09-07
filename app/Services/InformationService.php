<?php

namespace App\Services;

use App\Models\Information;
use Illuminate\Support\Facades\Auth;

class InformationService
{
    public function storeOrUpdateInformation(array $data, int $userId): Information
    {
        $information = Information::updateOrCreate(
            ['user_id' => $userId],
            $data
        );
        
        return $information;
    }
}
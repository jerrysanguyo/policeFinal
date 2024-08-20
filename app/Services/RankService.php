<?php

namespace App\Services;

use App\Models\Rank;
use Illuminate\Support\Facades\Auth;

class RankService
{
    public function rankStore(array $data): Rank
    {
        return Rank::create([
            'name'          =>  $data['name'],        
            'remarks'       =>  $data['remarks'],     
            'created_by'    =>  Auth::id(),           
            'updated_by'    =>  Auth::id(),           
        ]);
    }

    public function rankUpdate(Rank $rank, array $data): Rank
    {
        $rank->update([
            'name'          =>  $data['name'],        
            'remarks'       =>  $data['remarks'],     
            'updated_by'    =>  Auth::id(),           
        ]);

        return $rank;
    }
}

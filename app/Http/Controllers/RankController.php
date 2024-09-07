<?php

namespace App\Http\Controllers;

use App\{
    Models\Rank,
    Http\Requests\StoreRankRequest,
    Http\Requests\UpdateRankRequest,
    Datatables\UniversalDataTable,
    Services\RankService,
};
use Illuminate\Support\Facades\Auth;

class RankController extends Controller
{
    protected $rankService;

    public function __construct(RankService $rankService)
    {
        $this->rankService = $rankService;
    }

    public function index(UniversalDataTable $dataTable)
    {
        $listOfRanks = Rank::getAllRank();

        return $dataTable->render('Rank.index', compact(
            'listOfRanks'
        ));
    }
    
    public function store(StoreRankRequest $request)
    {
        $userRole = Auth::user()->role;
        $this->rankService->rankStore($request->validated());

        return redirect()->route($userRole . '.rank.index')->with(
            'success',
            'Rank added successfully!'
        );
    }
    
    public function edit(Rank $rank)
    {
        return view('Rank.edit', compact(
            'rank'
        ));
    }
    
    public function update(UpdateRankRequest $request, Rank $rank)
    {
        $userRole = Auth::user()->role;
        $this->rankService->rankUpdate($rank, $request->validated());

        return redirect()->route($userRole . '.rank.edit', $rank)->with(
            'success',
            'Rank updated successfully!'
        );
    }
    
    public function destroy(Rank $rank)
    {
        $rank->delete();

        return redirect()->route('superadmin.rank.index')->with(
            'success',
            'Rank deleted successfully!'
        );
    }
}

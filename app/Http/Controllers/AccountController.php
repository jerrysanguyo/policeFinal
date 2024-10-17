<?php

namespace App\Http\Controllers;

use App\{
    Models\User,
    Models\Course,
    Models\SpecialTraining,
    Models\SpecialCourse,
    Http\Requests\StoreUserRequest,
    Http\Requests\UpdateUserRequest,
    DataTables\UniversalDatatable,
    Services\AccountService,
};
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    protected $accountService;
    
    public function __construct(AccountService $accountService)
    {
        $this->accountService = $accountService;
    }

    public function index(UniversalDataTable $dataTable)
    {
        $listOfAccount = User::getAllUser();

        return $dataTable->render('account.index', 
                compact('listOfAccount'));
    }

    public function create()
    {
        return view('account.create');
    }
    
    public function store(StoreUserRequest $request)
    {
        $userRole = Auth::user()->role;
        $this->accountService->registerUser($request->validated());

        return redirect()->route($userRole . '.account.index')
                ->with('success', 'Account registered successfully!');
    }
    
    public function show(User $account)
    {
        $listOfCourse = Course::getAllCourse($account->id);
        $listOfSpecial = SpecialCourse::getAllSpecial();
        
        return view('account.details', compact(
            'account', 
            'listOfCourse', 
            'listOfSpecial'
        ));
    }
    

    public function edit(User $account)
    {
        return view('account.edit', 
                compact('account'));
    }

    public function update(UpdateUserRequest $request, User $account)
    {
        $userRole = Auth::user()->role;
        $this->accountService->updateUser($account, $request->validated());

        return redirect()->route($userRole . '.account.edit', $account)
                ->with('success', 'Account updated successfully!');
    }
    
    public function destroy(User $account)
    {
        $account->delete();

        return redirect()->route('superadmin.account.index')
                ->with('success', 'Account deleted successfully!');
    }
}
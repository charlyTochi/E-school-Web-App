<?php

namespace App\Http\Controllers\Api;

use App\AccountType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountTypeController extends Controller
{
    function getAccountType(){
        $acct_type = AccountType::all();
        return response()->json(['acct_type' => $acct_type], 200);
    }
}

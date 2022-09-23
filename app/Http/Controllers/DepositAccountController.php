<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Account;
use App\Models\Deposit;
use App\Models\Transfer;
use App\Models\Withdraw;
use Illuminate\Http\Request;

class DepositAccountController extends Controller
{
    protected $user;
    protected $account;
    protected $transfer;
    protected $deposit;


    public function __construct(User $user,
    Account $account, Transfer $transfer,Deposit $deposit) {
        $this->user     = $user;
        $this->account  = $account;
        $this->transfer = $transfer;
        $this->deposit = $deposit;
}
    public function deposit (Request $request)
    {
        //pegando a dados do usuario logado
        $user= auth()->user();
        $fromAccount = auth()->user()->account;



        // informando valor do saque
        $deposit = $this->deposit->create([
            'accounts_id'   => $request->$user= auth()->user()->id,
            'deposit'       => $request->deposit,
        ]);


        //tirando do saldo do usuario
        $balance = $user->account->balance;
        $retiredBalance = $deposit->deposit;
        $newbalance = $balance + $retiredBalance;
        $fromAccount->balance = $newbalance;
        $fromAccount->save();

        return response()->json('Dinheiro Inserido');

    }
}

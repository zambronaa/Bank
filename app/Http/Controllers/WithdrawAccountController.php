<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Agency;
use App\Models\Account;
use App\Models\Transfer;
use App\Models\Withdraw;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class WithdrawAccountController extends Controller
{
    protected $user;
    protected $account;
    protected $transfer;


    public function __construct(User $user,
    Account $account, Transfer $transfer,Withdraw $withdraw) {
        $this->user     = $user;
        $this->account  = $account;
        $this->transfer = $transfer;
        $this->withdraw = $withdraw;
}
    public function Withdraw (Request $request)
    {
        //pegando a dados do usuario logado
        $user= auth()->user();
        $fromAccount = auth()->user()->account;

        // // pedindo confirmação de senha
        // $password = $request->password;
        // //se a senha não for correta
        // if(Auth::attempt(['password'=> $password]))
        // {
        //     throw new Exception('Senha incorreta');
        // }

        // informando valor do saque
        $retired = $this->withdraw->create([
            'accounts_id'   => $request->$user= auth()->user()->id,
            'retired'       => $request->retired,
        ]);



        //tirando do saldo do usuario
        $balance = $user->account->balance;
        $retiredBalance = $retired->retired;
        $newbalance = $balance - $retiredBalance;
        $fromAccount->balance = $newbalance;
        $fromAccount->save();

        return response()->json('Dinheiro sacado');

    }
}

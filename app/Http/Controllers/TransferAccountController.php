<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Account;
use App\Models\Agency;
use App\Models\Transfer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class TransferAccountController extends Controller
{
    protected $user;
    protected $account;
    protected $transfer;


    public function __construct(User $user,
    Account $account, Transfer $transfer,Agency $agency) {
        $this->user     = $user;
        $this->account  = $account;
        $this->transfer = $transfer;
        $this->Agency   = $agency;
    }

    public function transfer (Request $request)

    {
           //Passar autenticão nas variaveis
        $toUser         = auth()->user();
        $fromAccount    = auth()->user()->account;

            //CRIAR VALOR QUE VAI TRANSFERIR
        $Transfercreated = $this->transfer->create([
            'accounts_id'           => $request->accounts_id = $toUser->id,
            'value_transfer'        => $request->value_transfer,
            'account_Totransfer'    => $request->account_Totransfer,
            'account_Fromtransfer'  => $request->account_Fromtransfer= $fromAccount->number_account,
        ]);

            //valor da transferencia
        $valueTransfer = $request->value_transfer;

            //Variavel que pega o saldo
        $balance = $fromAccount->balance;


            // verificar se o valor criado é maior que o saldo
        if(!$balance > $valueTransfer = $request->value_transfer)
        {
            throw new Exception('Saldo insuficiente');
        }

            //varificar se o numero da conta existe
        $account= Account::where('number_account','=',$Transfercreated->account_Totransfer)->first();
        if(!$account)
        {
            throw new Exception('Conta não existe');
        }
            // verificando se o cpf existe
        $cpf = $request->document_number;
        $cpfExist = User::where('document_number', '=', $cpf)->first();
        if(!$cpfExist)
        {
            throw new Exception('documento não existe');
        }
            //verificando se a agencia existe
        // $agency = $request->


            //atualizar saldo na conta final (quem recebeu)
        $accountToUser = Account::where('number_account','=',$Transfercreated->account_Totransfer)->first();
        $newBalanaceToUser = $accountToUser->balance + $request->value_transfer;
        $accountToUser->balance = $newBalanaceToUser;
        $accountToUser->save();

            //atualizar saldo na conta de origem (quem transferiu)
        $newBalance = $fromAccount->balance - $request->value_transfer;
        $fromAccount->balance = $newBalance;
        $fromAccount->save();

        return response()->json('transferencia concluida');
}
}

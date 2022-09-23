<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Account;
use App\Models\Payment;
use App\Models\Ticket;
use App\Models\Transfer;
use Illuminate\Http\Request;

class PaymentAccountController extends Controller
{
    protected $user;
    protected $account;
    protected $transfer;
    protected $payment;


    public function __construct(User $user,
    Account $account, Payment $payment) {
        $this->user     = $user;
        $this->account  = $account;
        $this->payment   = $payment;
}

    public function payment (Request $request)
    {
        $ticketFindNumber= $request->number_ticket;

        if($ticket = Ticket::where('number_ticket', '=', $ticketFindNumber))
        {
            if
        };

    }

}

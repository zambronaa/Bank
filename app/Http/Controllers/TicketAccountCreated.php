<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Ticket;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Laravel\Passport\Bridge\User;

class TicketAccountCreated extends Controller
{
    protected $user;
    protected $account;
    protected $transfer;


    public function __construct(User $user,
    Account $account, Ticket $ticket) {
        $this->user     = $user;
        $this->account  = $account;
        $this->ticket   = $ticket;
}

   public function Ticket (Request $request)
   {

    $agora = new DateTime();
    $mytime = Carbon::now(); //hj
    dd($trialExpires = $mytime->addDays(30));         //daqui 30 dias

    $user = auth()->user();
    $fromAccount = auth()->user()->accont;
    $today = Carbon::today();

    $ticket = $this->ticket->create([
        'accounts_id'       =>  $user->id,
        'number_ticket'     =>  rand(0,999999999999999999),
        'value_ticket'      =>  $request->value_ticket,
        'date_ticket'       =>  $today,
    ]);


    return response()->json($today);
   }

}

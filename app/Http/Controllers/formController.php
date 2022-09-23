<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Bank;
use App\Models\User;

use App\Models\Agency;
use App\Models\Account;
use App\Models\Endereco;
use Illuminate\Http\Request;
use Faker\Provider\ar_EG\Address;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Exception\BadResponseException;
use App\Http\Requests\StoreUpdateUserFromRequest;

class formController extends Controller
{
    protected $addresses;
    protected $user;
    protected $account;
    protected $agency;
    protected $bank;


    public function __construct(Endereco $addresses,
    User $user,
    Account $account, Agency $agency, Bank $bank) {
        $this->addresses = $addresses;
        $this->user = $user;
        $this->account = $account;
        $this->agency = $agency;
        $this->bank = $bank;
    }

    public function store(StoreUpdateUserFromRequest $request)
    {   //CADASTRO USUARIO
        $user = $this->user->create([
            'document_type'     => $request->document_type,
            'document_number'   => $request->document_number,
            'name'              => $request->name,
            'email'             => $request->email,
            'password'          => bcrypt($request->password),
        ]);
        //CADASTRO ENDEREÇO
        $addresses = $this->addresses->create([
            'user_id'           => $user->id,
            'cep'               => $request->cep,
            'addreses'          => $request->addreses,
            'number'            => $request->number,
            'district'          => $request->district,
            'complement'        => $request->complement,
            'state'             => $request->state,
            'city'              => $request->city,

        ]);
        // CADASTRO CONTA
        $account = $this->account->create([
            'user_id'           => $user->id,
            'agency_id'         => 001,
            'balance'           => 1000,
            'number_account'    => rand(0,9999999999999999),
        ]);


        $bank = $this->bank->created([
            'name_bank'         =>'GeneraBank',
            'number_bank'       => 01
        ]);

        // //criando agencia
        $agency = $this->agency->created([
            'bank_id'           => 01,
            'number_agency'     => 0011,
        ]);


        return response()->json([ 'data' => [
            'user'          =>  $user,
            'addresses'     =>  $addresses,
            'account'       =>  $account,
            'agency'        =>  $agency,
            'bank'          =>  $bank
        ]
        ]);
    }

    public function edit (StoreUpdateUserFromRequest $request, $id)
    {

        $addresses = $this->addresses->update([
              'cep' =>        $request->cep,
              'addreses' =>   $request->addreses,
              'number' =>     $request->number,
              'district' =>   $request->district,
              'complement' => $request->complement,
              'state' =>      $request->state,
              'city' =>       $request->city,
          ]);
          $addresses = $this->addresses->save();

          return response()->json([$addresses]);
    }

    public function show ()
    {
                //CHAMANDO USER
            $user               = auth()->user();
            $userEmail          = $user->email;
            $userName           = $user->name;
            $cpf                = $user->document_number;
                //CHAMANDO ACCOUNT
            $userAccount        = auth()->user()->account;
            $balance            = $userAccount->balance;
            $numberAccount      = $userAccount->number_account;
            $agency             = $userAccount->agency_id;




        return response()->json(
        [
            'userName'          => $userName,
            'email'             => $userEmail,
            'cpf'               => $cpf,
            'account_balance'   => $balance,
            'accounts_number'   => $numberAccount,
            'agency_id'         => $agency,
        ]
        );
    }

    public function getUser($id)
    {
        $user = User::find($id);

        return response()->json([
            'userName'          =>   $user->name,
            'email'             =>   $user->email,
            'cpf'               =>   $user->document_number,
            'account_balance'   =>   $user->account->balance,
            'accounts_number'   =>   $user->account->number_account
        ]);
    }

    public function delete ()
    {
        // $user = User::findOrFail($id);
        // if($user)
        //     $user->delete();
        // else
        // $user = $this->user->find($id);
        //     return response()->json('error');
        $deleted = User::where('password')->delete();
        return response()->json('Usuario deletado');
    }
    }













// return response()->json([ 'data' => [
        //     'user' => $user,
        //     'addresses' => $addresses
        // ]
        // ]);

        // $addresses = $this->addresses->create([
        //     'user_id' => $user->id,
        //     'cep' => $request->cep,
        //     'addreses' => $request->addreses,
        //     'number' => $request->number,
        //     'district' => $request->district,
        //     'complement' => $request->complement,
        //     'state' => $request->state,
        //     'city' => $request->city
        // ]);

        // $data = $request->all();
        // $data['password'] = bcrypt($request->password);
        // $data['user_id'] = ($request -> id);
        // $user = $this->model->create($data);

        // $data = $request->all();
        // $user = $this->addresses->create($data);

        // return response()->json($user);

        // $data = user::create([
        //     'document_type'     => $request->document_type,
        //     'document_number'   => $request->document_zumber,
        //     'name'              => $request->name,
        //     'email'             => $request->email,
        //     'password'          => bcrypt($request->password)
        // ]);

        // $addresses = Endereco::class([
        //     'cep'               => $request->cep,
        //     'addreses'          => $request->addresses,
        //     'number'            => $request->number,
        //     'district'          => $request->district,
        //     'complement'        => $request->complement,
        //     'state'             => $request->state,
        //     'city'              => $request->city
        // ]);

        // $form = [$data,$addresses];


        //     public function index ()   //puxando dados do db no insomnia
//     {
//         $data = Endereco::where('user_id', 1)->first();

//         dd($data->user->name);

//     }

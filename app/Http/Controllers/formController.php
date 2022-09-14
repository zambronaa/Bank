<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Endereco;

use Illuminate\Http\Request;
use Faker\Provider\ar_EG\Address;
use GuzzleHttp\Exception\BadResponseException;
use App\Http\Requests\StoreUpdateUserFromRequest;

class formController extends Controller
{
    protected $addresses;
    protected $user;


    public function __construct(Endereco $addresses, User $user) {
        $this->addresses = $addresses;
        $this->user = $user;
    }

    public function store(StoreUpdateUserFromRequest $request)
    {

        $user = $this->user->create([
            'document_type'     => $request->document_type,
            'document_number'   => $request->document_number,
            'name'              => $request->name,
            'email'             => $request->email,
            'password'          => bcrypt($request->password),
        ]);

        $addresses = $this->addresses->create([
            'user_id'           => $user->id,
            'cep'               => $request->cep,
            'addreses'          => $request->addreses,
            'number'            => $request->number,
            'district'          => $request->district,
            'complement'        => $request->complement,
            'state'             => $request->state,
            'city'              => $request->city,
            // 'number_card' => rand(0, 99999)
        ]);


        return response()->json([ 'data' => [
            'user'      =>  $user,
            'addresses' =>  $addresses
        ]
        ]);
    }

    public function edit (StoreUpdateUserFromRequest $request, $id)
    {
        // $addresses = Endereco::where('id' , $id)->first();

        if(!$addresses = Endereco::find($id))  {
          throw new Exception('Usuario não encontrado');
        }
        $addresses->update([
            'cep' =>        $request->cep,
            'addreses' =>   $request->addreses,
            'number' =>     $request->number,
            'district' =>   $request->district,
            'complement' => $request->complement,
            'state' =>      $request->state,
            'city' =>       $request->city,
        ]);
        $addresses->save();

        return response()->json([$addresses]);
    }

    public function show (StoreUpdateUserFromRequest $request, $id)
    {
        if(!$user = User::find($id)) {
            throw new Exception('Usuario não encontrado');
        }
        $addresses = Endereco::findOrFail($id);
        // $user = User::findOrFail($id);

        return response()->json([ 'data' => [
            'user'      =>  $user,
            'addresses' =>  $addresses
        ]
        ]);
    }

    public function delete ($id)
    {
        $user = User::findOrFail($id);
        if($user)
            $user->delete();
        else
            return response()->json('error');
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

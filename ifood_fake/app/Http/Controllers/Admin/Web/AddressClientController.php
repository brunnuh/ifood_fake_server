<?php

namespace App\Http\Controllers\Admin\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressClientRequest;
use App\Models\Address_Client;
use App\Models\Client;
use Illuminate\Http\Request;

class AddressClientController extends Controller
{

    /**
     * @var Client
     */
    private $client;
    private  $address_Client;
    public function __construct(Client $client, Address_Client $address_Client)
    {
        $this->address_Client = $address_Client;
        $this->client = $client;
    }

    public function create($id)
    {
       if(!$address_client = $this->address_Client->where("client_id", $id)->with("client:id,full_name")->first()){
           $address_client = $this->client->where("id",$id)->get(["full_name", "id"])->first();
       }

        return view("admin.pages.client.create_address",[
            "address_client" => $address_client
        ]);
    }

    public function store(AddressClientRequest $request, $id)
    {
        $data = $request->all();
        $data["client_id"] = $id;
        $this->address_Client->create($data);
        return redirect()->route("clients.index");

    }
}

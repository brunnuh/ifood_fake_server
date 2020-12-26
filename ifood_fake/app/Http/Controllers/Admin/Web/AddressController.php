<?php

namespace App\Http\Controllers\Admin\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressRequest;
use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;

class AddressController extends Controller
{

    private $user;
    private  $address;
    public function __construct(User $user, Address $address)
    {
        $this->address= $address;
        $this->user = $user;
    }

    public function create($id)
    {
       if(!$address = $this->address->where("user_id", $id)->with("user:id,full_name")->first()){
           $address = $this->user->where("id",$id)->get(["full_name", "id"])->first();
       }

        return view("admin.pages.user.create_address",[
            "address" => $address
        ]);
    }

    public function store(AddressRequest $request, $id)
    {
        $data = $request->except("_token");

        $data["user_id"] = $id;
        $this->address->create($data);
        return redirect()->route("users.index");
    }

    public function update(AddressRequest $request, $id)
    {
        $data = $request->except(["_token", "_method"]);
        $address = $this->address->where("user_id", $id);
        $address->update($data);
        return redirect()->route("users.index");
    }
}

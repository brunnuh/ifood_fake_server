<?php

namespace App\Http\Controllers\Admin\Web;

use App\Http\Controllers\Controller;

use App\Http\Requests\ClientRequest;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $clients = $this->client->paginate();
        return view("admin.pages.client.index",[
            "clients" => $clients
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view("admin.pages.client.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ClientRequest $request)
    {
        $data = $request->all();
        $data["password"] = bcrypt($data["password"]);
        $this->client->create($data);
        return redirect()->route("clients.index");
    }

    public function destroy($id)
    {
        $client = $this->client->find($id);
        $client->delete();
        return redirect()->route("clients.index");
    }


}

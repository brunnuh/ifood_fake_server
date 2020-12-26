<?php

namespace App\Http\Controllers\Admin\Web;

use App\Http\Controllers\Controller;

use App\Http\Requests\UsersRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    protected $user;

    public function __construct(User $users)
    {
        $this->user = $users;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = $this->user->paginate();
        return view("admin.pages.user.index",[
            "users" => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view("admin.pages.user.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UsersRequest $request)
    {

        $data = $request->all();
        $data["password"] = bcrypt($data["password"]);
        $this->user->create($data);
        return redirect()->route("users.index");
    }

    public function destroy($id)
    {
        $user = $this->user->find($id);
        $user->delete();
        return redirect()->route("users.index");
    }


}

<?php

namespace App\Http\Controllers\Admin\Web;

use App\Http\Controllers\Controller;

use App\Http\Requests\UsersRequest;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    protected $user;
    protected $permission;

    public function __construct(User $users, Permission $permission)
    {
        $this->user = $users;
        $this->permission = $permission;
    }

    public function indexPermissions($id)
    {
        $user = $this->user->where("id",$id)->with("permissions:id,name")->first();
        return view("admin.pages.user.permission.index",[
            "user" => $user
        ]);
    }

    public function detachPermission($user_id, $permission_id)
    {
        $user = $this->user->find($user_id);
        $user->permissions()->detach($permission_id);
        return view("admin.pages.user.permission.index",[
            "user" => $user
        ]);
    }

    public function getPermissions($id)
    {
        $permissions = $this->permission->all();
        $user = $this->user->select("id", "full_name")->where("id",$id)->first();
        return view("admin.pages.user.permission.create",[
            "permissions" => $permissions,
            "user" => $user->with("permissions:id,name")->first()
        ]);
    }

    public function putPermissions(Request $request, $id)
    {
        $data = $request->only("permissions");
        $user = $this->user->find($id);
        foreach ($data as $permission){
            $user->permissions()->attach($permission);
        }
        return redirect()->route("users.index");
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

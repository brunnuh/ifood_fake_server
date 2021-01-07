<?php

namespace App\Http\Controllers\Admin\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\RestaurantRequest;
use App\Models\CategoryRestaurant;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{

    private $restaurant;
    private $user;
    public function __construct(Restaurant $restaurant, User $user)
    {
        $this->restaurant = $restaurant;
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $restaurants = $this->restaurant->with("user:id,full_name")->paginate();
        return view("admin.pages.restaurant.index",[
            "restaurants" => $restaurants
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $users = $this->user->all();
        $category_restaurant = CategoryRestaurant::all();
        return view("admin.pages.restaurant.create",[
            "users" => $users,
            "category_restaurant" => $category_restaurant
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RestaurantRequest $request) // admin cria um restaurante
    {

        $data = $request->except("image");

        if($request->hasFile("image") && $request->image->isValid()){
            $data["image"] = $request->image->store("restaurants");
        }
        $this->restaurant->create($data);

        return redirect()->route("restaurants.index");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($cnpj)
    {
      $restaurant = $this->restaurant->where("cnpj", $cnpj)->first();
      return view("admin.pages.restaurant.edit",[
          "restaurant" => $restaurant
      ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(RestaurantRequest $request, $cnpj)
    {
        $data = $request->except(["image", "_token", "_method"]);
        $restaurant = $this->restaurant->where("cnpj", $cnpj)->first();

        if($request->hasFile("image") && $request->image->isValid()){
            Storage::delete("{$restaurant->image}");
            $data["image"] = $request->image->store("restaurants");
        }

        $restaurant->update($data);
        return redirect()->route("restaurants.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($cnpj)
    {
        $restaurant = $this->restaurant->find($cnpj);
        if(!is_null($restaurant->image)){
            Storage::delete($restaurant->image);
        }
        $restaurant->delete();
        return redirect()->route("restaurants.index");
    }

    public function modifyStatus($cnpj)
    {
        $restaurant = $this->restaurant->findOrFail($cnpj);
        $restaurant->status_operating = $restaurant->status_operating == 1 ? 0 : 1;
        $restaurant->save();
        return redirect()->route("restaurants.index");
    }

    public function indexRestaurant()
    {
        if(!auth()->check()){
            return redirect()->back();
        }
        $category_restaurant = CategoryRestaurant::all();

        return view("admin.pages.restaurant.create", [
            "category_restaurant" => $category_restaurant
        ]);
    }

    public function newRestaurant(Request $request) // criar seu restaurante
    {
        $data = $request->all();
        if (!$data["user_id"] = auth()->id()){
            return redirect()->back();
        }
        if($request->hasFile("image") && $request->image->isValid()){
            $data["image"] = $request->image->store("restaurants");
        }
        $this->restaurant->create($data);


        // modificar para id fixos das permissoes
        for ($id = 2; $id <= 4; $id += 2){
            auth()->user()->permissions()->attach([
                "permission_id" => $id
            ]);
        }
        auth()->user()->permissions()->detach([
            "permission_id" => 6
        ]);

        return redirect()->route("admin.home");
    }
}

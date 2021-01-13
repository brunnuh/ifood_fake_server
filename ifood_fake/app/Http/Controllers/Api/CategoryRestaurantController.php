<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\RestaurantResource;
use App\Models\CategoryRestaurant;
use Illuminate\Http\Request;

class CategoryRestaurantController extends Controller
{
    /**
     * @var CategoryRestaurant
     */
    private $categoryRestaurant;

    public function __construct(CategoryRestaurant $categoryRestaurant)
    {
        $this->categoryRestaurant = $categoryRestaurant;
    }


    public function show($id)
    {
        try {
            $restaurants = $this->categoryRestaurant
                                ->join('restaurants', 'category_restaurant.id', '=', 'restaurants.category_restaurant_id')
                                ->where('category_restaurant_id', $id)
                                ->paginate(); //restaurantes do id requerido

            return response()->json(RestaurantResource::collection($restaurants)->response()->getData(true), 200);
        }catch (\Exception $e){
            return response()->json(["data" => $e->getMessage()], 401);
        }
    }
}

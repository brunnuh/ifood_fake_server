<?php

namespace App\Http\Controllers\Admin\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    protected $product;
    protected $restaurant;
    protected $category;

    public function __construct(Product $product, Category $category, Restaurant $restaurant)
    {
        $this->product = $product;
        $this->restaurant = $restaurant;
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $products = $this->product->with(["category:id,name", "restaurant:cnpj,name"])->paginate();
        return view("admin.pages.product.index",[
            "products" => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categories = $this->category->all();
        $restaurants = $this->restaurant->all();

        return view("admin.pages.product.create",[
            "categories" => $categories,
            "restaurants" => $restaurants
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->except(["_token", "image"]);
       // dd($request->all());
        if($request->hasFile("image") && $request->image->isValid()){
            $data["image"] = $request->image->store("products/".$request->name);
        }
        $this->product->create($data);

        return redirect()->route("products.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $product = $this->product->findOrFail($id);
        $categories = $this->category->all();
        $restaurants = $this->restaurant->all();

        return view("admin.pages.product.edit",[
            "categories" => $categories,
            "restaurants" => $restaurants,
            "product" => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, int $id)
    {
        $data = $request->except("image");
        $product = $this->product->findOrFail($id);
        if($request->hasFile("image") && $request->image->isValid()){
            Storage::delete($product->image);
            $data["image"] = $request->image->store("products/".$request->name);
        }
        $product->update($data);
        return redirect()->route("products.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->product->findOrFail($id);
        if(!is_null($product->image)){
            Storage::delete($product->image);
        }
        $product->delete();
        return redirect()->route("products.index");
    }
}

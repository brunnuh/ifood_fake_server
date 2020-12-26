<?php

namespace App\Http\Controllers\Admin\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * @var Category
     */
    private $category;
    private $user;

    public function __construct(Category $category, User $user)
    {
        $this->user = $user;
        $this->category = $category;
    }


    public function index()
    {
        $categories = $this->category->paginate();

        return view("admin.pages.category.index",[
            "categories" => $categories
        ]);
    }

    public function create()
    {
        $users = $this->user->all();
        return view("admin.pages.category.create",[
            "users" => $users
        ]);
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->except("photo");

        if ($request->hasFile("photo") && $request->photo->isValid()){
            $data["photo"] = $request->photo->store("categories");
        }
        $this->category->create($data);
        return redirect()->route("categories.index");
    }

    public function edit($id)
    {
        $category = $this->category->findOrFail($id);
        return view("admin.pages.category.edit",[
            "category" => $category
        ]);
    }

    public function update(CategoryRequest $request, $id)
    {
        $data = $request->except("photo");
        $category = $this->category->findOrFail($id);

        if ($request->hasFile("photo") && $request->photo->isValid()){
            Storage::disk("public")->delete("{$category->photo}");
            $data["photo"] = $request->photo->store("categories");
        }
        $category->update($data);

        return redirect()->route("categories.index");
    }
}

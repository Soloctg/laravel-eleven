<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    //
    public function index()
    {
        abort_if(! auth()->user()->tokenCan('categories-list'), 403);

        //return Category::all();
        return CategoryResource::collection(Category::all());

    }

    public function show(Category $category)
    {
        abort_if(! auth()->user()->tokenCan('categories-show'), 403);
        //return $category;
        return new CategoryResource($category);
    }

    public function list()
    {
        return CategoryResource::collection(Category::all());
    }

    public function store(StoreCategoryRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $name = 'categories/' . Str::uuid() . '.' . $file->extension();
            $file->storePubliclyAs('public', $name);
            $data['photo'] = $name;
        }

        $category = Category::create($data);

        return new CategoryResource($category);

        //$category = Category::create($request->all());

        //return new CategoryResource($category);
    }

    public function update(Category $category, StoreCategoryRequest $request)
    {
        $category->update($request->all());

        return new CategoryResource($category);
    }


    public function destroy(Category $category)
    {
        $category->delete();

        //return response(null, Response::HTTP_NO_CONTENT); // or the below which is shorter
        return response()->noContent();
    }


}

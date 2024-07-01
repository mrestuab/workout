<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['list']);
        // $this->middleware('auth:api')->only(['store', 'update', 'delete']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return response()->json([
            'data' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => '',
            'description' => '',
            'image' => 'required|image|mimes:jpg,png,jpeg,webp'
        ]);

        if ($validator->fails()){
            return response()->json(
                $validator->errors(),
                422
            );
        }

        $input = $request->all();

        if ($request->has('image')) {
            $image = $request->file('image');
            $image_name = time() . rand(1, 9) .'.'. $image->getClientOriginalExtension();
            $image->move('uploads', $image_name);
            $input['image'] = $image_name;
        }

        $category = Category::create($input);

        return response()->json([
            'success' => true,
            'data' => $category
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return response()->json([
            'data' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $validator = Validator::make($request->all(), [
            'name' => '',
            'description' => '',
        ]);

        if ($validator->fails()){
            return response()->json(
                $validator->errors(),
                422
            );
        }

        $input = $request->all();

        if ($request->has('name')) {
            file::delete('uploads/' . $category->image);
            $image = $request->file('image');
            $image_name = time() . rand(1, 9) .'.'. $image->getClientOriginalExtension();
            $image->move('uploads', $image_name);
            $input['image'] = $image_name;
        } else {
            unset($input['image']);
        }


        $category->update($input);

        return response()->json([
            'success' => true,
            'message' => 'success',
            'data' => $category
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        file::delete('uploads/' . $category->image);
        $category->delete();

        return response()->json([
            'success' => true,
            'message' => 'success'
        ]);
    }
}

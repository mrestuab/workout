<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function __construct()
    {
        // $this ->middleware('auth:api', ['except' => 'index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return response()->json([
            'data' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,webp,gif,mp4',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(
                $validator->errors(),
                422
            );
        }

        $input = $request->all();

        if ($request->has('image')) {
            $image = $request->file('image');
            $image_name = time() . rand(1, 9) . '.' . $image->getClientOriginalExtension();
            $image->move('uploads', $image_name);
            $input['image'] = $image_name;
        }

        $product = Product::create($input);

        return response()->json([
            'success' => true,
            'data' => $product
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return response()->json([
            'data' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
{
    // Validate the request data
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'image' => 'required|image|mimes:jpg,png,jpeg,webp,gif,mp4',
        'description' => 'required',
    ]);

    // Return validation errors if any
    if ($validator->fails()) {
        return response()->json($validator->errors(), 422);
    }

    // Retrieve all request data
    $input = $request->all();

    // Handle image upload if present
    if ($request->hasFile('image')) {
        // Delete old image file if exists
        if (File::exists('uploads/' . $product->image)) {
            File::delete('uploads/' . $product->image);
        }

        // Save new image file
        $image = $request->file('image');
        $image_name = time() . rand(1, 9) . '.' . $image->getClientOriginalExtension();
        $image->move('uploads', $image_name);
        $input['image'] = $image_name;
    } else {
        unset($input['image']);
    }

    // Update the product with new data
    $product->update($input);

    // Return success response
    return response()->json([
        'message' => 'success',
        'data' => $product
    ]);
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        File::delete('uploads/' . $product->image);

        $product->delete();

        return response()->json([
            'message' => 'success'
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail(string $productId)
    {
        $product = Product::findOrFail($productId);

        return view('product-detail', compact('product'));
    }
}
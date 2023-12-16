<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

use App\Repositories\ProductRepository;
use App\Services\ProductService;

class ProductController extends Controller
{

    public $productRepository;
    public $productService;

    public function __construct(
        ProductRepository $productRepository, 
        ProductService $productService)
    {
        $this->productRepository = $productRepository;
        $this->productService = $productService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products  = $this->productRepository->findAll();
        return view('products.index')->with(['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product  = Product::find($id);
        $hasFullAccess = Auth::check() ? Order::where('user_id', Auth::user()->id)->where('product_id', $id)->first() : null; 
        // dd()
        return view('products.show')-> with(['product' => $product, 'hasFullAccess' => $hasFullAccess]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

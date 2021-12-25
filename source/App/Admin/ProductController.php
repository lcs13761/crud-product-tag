<?php

namespace Source\App\Admin;

use Exception;
use Source\Core\Controller;
use Pecee\Controllers\IResourceController;
use Source\Models\Category;
use Source\Models\Product;
use Source\Models\Tag;
use Source\Request\ProductRequest;

class ProductController extends Controller implements IResourceController
{

    public function index(): string
    {
        $products = Product::all();
        $products_tags = Product::manyToMany();
        return $this->view->render("admin/product/index", compact('products', 'products_tags'));
    }

    public function create(): string
    {
        $tags = Tag::all();
        return $this->view->render("admin/product/form", compact('tags'));
    }

    public function store()
    {
        $request = new ProductRequest();
        if (!$request->validation()) redirect(url_back());
        $product = Product::create($request->all());
        $product->tag()->attach($request->tags);
        redirect(url('product.index'));
    }

    public function show($id)
    {
    }

    public function edit($id): string
    {
        $product = Product::find($id);
        $tags = Tag::all();
        $product_tag = $product->tag()->get();
        return $this->view->render("admin/product/form", compact('product', 'tags', 'product_tag'));
    }


    /**
     * @throws Exception
     */
    public function update($id): void
    {
        $request = new ProductRequest();
        if (!$request->validation()) redirect(url_back());
        $product = Product::find($id);
        $product->update($request->all());
        $product->tag()->sync($request->tags);
        redirect(url('product.index'));
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product->image) $this->file->destroy($product->image);
        if (!$product->destroy()) return response()->json(["status" => "error"], 500);
        return response()->json(["status" => 'success']);
    }

}
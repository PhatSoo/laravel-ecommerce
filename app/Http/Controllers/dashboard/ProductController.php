<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function listAllProducts() {
        return view('dashboard.pages.product', ['products' => Product::all(), 'categories' => Category::all()]);
    }

    public function createProduct(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|unique:products,name',
            'category_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $product = new Product();
        $product->fill($request->all());

        $product->save();
        return redirect()->route('d.product-list')->with('success', 'Product created successfully!');
    }

    public function updateProduct(Request $request, $id) {
        try {
            $prod = Product::findOrFail($id);
            $fieldsToUpdate = [];

            if ($request->name !== $prod->name) {
                $validator = Validator::make($request->all(), [
                    'name' => 'required|unique:products,name|min:3'
                ]);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $fieldsToUpdate['name'] = $request->name;
            }

            $fieldsToUpdate['status'] = $request->has('status');
            $fieldsToUpdate['stock'] = $request->stock;

            $prod->fill($fieldsToUpdate);
            $prod->save();

            return redirect()->route('d.product-list')->with('success', 'Product updated successfully!');
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->withErrors(['404' => 'Product not found.']);
        }
    }

    public function deleteProduct($id) {
        try {
            $prod = Product::findOrFail($id);
            $prod->delete();

            return redirect()->route('d.product-list')->with('success', 'Product deleted successfully!');
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with(['404' => 'Product not found.']);
        }
    }

    public function listAllCategories() {
        return view('dashboard.pages.product-category', ['categories' => Category::all()]);
    }

    public function createCategory(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:categories,name|min:3'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $category = new Category();
        $category->name = $request->name;

        $category->save();

        return redirect()->route('d.product-category')->with('success', 'Category created successfully!');
    }

    public function updateCategory(Request $request, $id) {
        try {
            $cate = Category::findOrFail($id);
            $fieldsToUpdate = [];

            if ($request->name !== $cate->name) {
                $validator = Validator::make($request->all(), [
                    'name' => 'required|unique:categories,name|min:3'
                ]);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $fieldsToUpdate['name'] = $request->name;
            }

            $fieldsToUpdate['status'] = $request->has('status');

            $cate->fill($fieldsToUpdate);
            $cate->save();

            return redirect()->route('d.product-category')->with('success', 'Category updated successfully!');
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->withErrors(['404' => 'Category not found.']);
        }
    }

    public function deleteCategory($id) {
        try {
            $cate = Category::findOrFail($id);
            $cate->delete();

            return redirect()->route('d.product-category')->with('success', 'Category deleted successfully!');
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with(['404' => 'Category not found.']);
        }
    }
}

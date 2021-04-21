<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{



    public function homeProducts()
    {


        $products = Product::paginate(8);

        $totalProducts = $this->getQuantity();

        $newArrivals = Product::where('type', 'newarrival')->take(4)->get();

        return view('home', compact('products', 'totalProducts', 'newArrivals'));
    }

    public function getQuantity()
    {


        if (session('cart')) {
            // dd(session('cart'));
            $productsCollection = collect([]);

            foreach (session('cart') as $product) {

                $currentProduct = collect([]);
                $currentProduct->push(Product::find($product['id']));
                $currentProduct->push($product['qty']);
                $productsCollection->push($currentProduct);
            }

            $totalProducts = 0;
            foreach ($productsCollection as $product) {

                $totalProducts  = $totalProducts + $product[1];
            }
        } else {

            $totalProducts = false;
        }


        return $totalProducts;
    }



    public function allproducts()
    {

        if (!session('userId')) {

            return redirect('/admin/login');
        }

        $page = 'allproducts';
        $products = Product::all();

        return view('allproducts', compact('page', 'products'));
    }

    public function showProduct($id)
    {

        $product = Product::where('id', $id)->first();
        $totalProducts = $this->getQuantity();
        return view('product', compact('product', 'totalProducts'));
    }

    public function saveFile($file)
    {

        if (!$file) {

            return;
        }

        $uploadedFile = $file->getClientOriginalName();

        $uploadedFileExtension = $file->getClientOriginalExtension();

        $uploadedFileStoringName = $uploadedFile . '_' . time() . '.' . $uploadedFileExtension;

        return $path =  $file->storeAs('', $uploadedFileStoringName, 'local');
    }

    public function createProduct(Request $request)
    {

        if (!session('userId')) {

            return redirect('/');
        }

        $name        =  $request->input('name');
        $title       =  $request->input('title');
        $description =  $request->input('description');
        $stock       =  $request->input('stock');
        $Category    =  $request->input('Category');
        $salePrice   =  $request->input('salePrice');
        $price       =  $request->input('price');
        $rating      =  $request->input('rating');
        $type        =  $request->input('type');

        $frontImageFile = $request->file('frontImage');
        $mainImageFile  = $request->file('mainImage');
        $subImage1File  = $request->file('subImage1');
        $subImage2File  = $request->file('subImage2');
        $subImage3File  = $request->file('subImage3');
        $subImage4File  = $request->file('subImage4');
        $subImage5File  = $request->file('subImage5');

        $frontImage = $this->saveFile($frontImageFile);
        $mainImage  = $this->saveFile($mainImageFile);
        $subImage1  = $this->saveFile($subImage1File);
        $subImage2  = $this->saveFile($subImage2File);
        $subImage3  = $this->saveFile($subImage3File);
        $subImage4  = $this->saveFile($subImage4File);
        $subImage5  = $this->saveFile($subImage5File);

        $product = new Product();

        $product->name = $name;
        $product->title = $title;
        $product->description = $description;
        $product->stock = $stock;
        $product->category = $Category;
        $product->rating = $rating;
        $product->salePrice = $salePrice;
        $product->price = $price;
        $product->type  = $type;




        $product->frontImage = $frontImage;
        $product->mainImage = $mainImage;
        $product->subImage1 = $subImage1;
        $product->subImage2 = $subImage2;
        $product->subImage3 = $subImage3;
        $product->subImage4 = $subImage4;
        $product->subImage5 = $subImage5;

        if ($product->save()) {

            return redirect()->back()->with(['successfull' => 'A new product has been created!']);
        };
    }


    public function productDelete($id)
    {

        if (!session('userId')) {

            return redirect('/admin/login');
        }

        $product = Product::find($id);
        if ($product->delete()) {

            return redirect()->back()->with(['deleted' => 'Successfully deleted 1 product']);
        };
    }


    public function editProduct($id)
    {


        $page = 'allproducts';

        $product = Product::findOrFail($id);


        return view('productEdit', compact('page', 'product'));
    }


    public function updateProduct($id, Request $request)
    {

        if (!session('userId')) {

            return redirect('/');
        }

        $name        =  $request->input('name');
        $title       =  $request->input('title');
        $description =  $request->input('description');
        $stock       =  $request->input('stock');
        $Category    =  $request->input('Category');
        $salePrice   =  $request->input('salePrice');
        $price       =  $request->input('price');
        $rating      =  $request->input('rating');
        $type        =  $request->input('type');

        $frontImageFile = $request->file('frontImage');
        $mainImageFile  = $request->file('mainImage');
        $subImage1File  = $request->file('subImage1');
        $subImage2File  = $request->file('subImage2');
        $subImage3File  = $request->file('subImage3');
        $subImage4File  = $request->file('subImage4');
        $subImage5File  = $request->file('subImage5');

        $frontImage = $this->saveFile($frontImageFile);
        $mainImage  = $this->saveFile($mainImageFile);
        $subImage1  = $this->saveFile($subImage1File);
        $subImage2  = $this->saveFile($subImage2File);
        $subImage3  = $this->saveFile($subImage3File);
        $subImage4  = $this->saveFile($subImage4File);
        $subImage5  = $this->saveFile($subImage5File);

        $product = Product::findOrFail($id);

        $product->name        = $name;
        $product->title       = $title;
        $product->description = trim($description);
        $product->stock       = $stock;
        $product->category    = $Category;
        $product->rating      = $rating;
        $product->salePrice   = $salePrice;
        $product->price       = $price;
        $product->type        = $type;
        if ($frontImage) {

            $product->frontImage = $frontImage;
        }

        if ($mainImage) {


            $product->mainImage = $mainImage;
        }

        if ($subImage1) {

            $product->subImage1 = $subImage1;
        }

        if ($subImage2) {
            $product->subImage2 = $subImage2;
        }
        if ($subImage3) {

            $product->subImage3 = $subImage3;
        }

        if ($subImage4) {


            $product->subImage4 = $subImage4;
        }

        if ($subImage5) {

            $product->subImage5 = $subImage5;
        }


        if ($product->save()) {

            return redirect()->back()->with(['successfull' => 'Product Has Been Updated!']);
        };
    }
}

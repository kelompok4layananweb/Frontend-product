<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    protected $productRepo;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    public function index()
    {
        if (request()->ajax()) {
            return $this->productRepo->datatables();
        }
        return view('pages.product.index');
    }

    public function create()
    {
        return view('pages.product.create');
    }

    public function store(Request $request)
    {
        $response = Http::post('http://127.0.0.1:8000/api/product', [
            'name' => $request->name,
            'merek' => $request->merek,
            'min_stock' => $request->min_stock,
            'price' => $request->price,
        ]);

        if ($response->successful()) {
            return redirect()->route('master.produk.index');
        } else {
            $error = $response->json()['message']; // Menangkap pesan kesalahan dari response JSON
            return back()->with('error', $error);
        }
    }
    public function edit($id)
    {
        // return $id;
        $product = $this->productRepo->getById($id);
        $data = Product::all();
        return view('pages.product.edit', compact('product','data'));
    }

    public function update(ProductRequest $request, $id)
    {
        $this->productRepo->update($request, $id);

        toastr()
            ->positionClass('toast-bottom-left')
            ->addSuccess('Produk berhasil diubah');

        return redirect()->route('master.produk.index');
    }

    public function destroy($id)
    {
        $this->productRepo->delete($id);

        toastr()
            ->positionClass('toast-bottom-left')
            ->addSuccess('Produk berhasil dihapus');

        return redirect()->route('master.produk.index');
    }
}

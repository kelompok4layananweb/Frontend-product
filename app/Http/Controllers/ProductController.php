<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

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

    public function store(ProductRequest $request)
    {
        $this->productRepo->store($request);

        toastr()
            ->positionClass('toast-bottom-left')
            ->addSuccess('Produk berhasil ditambah');

        return redirect()->route('master.produk.index');
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

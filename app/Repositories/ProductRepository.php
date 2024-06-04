<?php

namespace App\Repositories;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Product;

class ProductRepository
{
    public function datatables()
    {
        $data = Product::with('brand', 'unit')
            ->latest();

        return \DataTables::eloquent($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn = '';

                $btn .= '<div class="flex space-x-3 rtl:space-x-reverse">';
                $btn .= '
                <div class="action-btn">
                    <a href="' . route('master.produk.edit', $row->id) . '" class="text-info edit">
                        <i class="ti ti-edit fs-5"></i>
                    </a>
                    <form action="' . route('master.produk.destroy', $row->id) . '" method="POST" class="d-inline-block">
                    ' . csrf_field() . '
                    ' . method_field('delete') . '
                        <a href="javascript:void()" class="text-dark delete ms-2 btn-delete">
                            <i class="ti ti-trash fs-5"></i>
                        </a>
                    </form>
                </div>
                ';
                $btn .= '</div>';

                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function getById($id)
    {
        return Product::findOrFail($id);
    }

    public function store(ProductRequest $request)
    {
        $data = $request->only('name', 'merek',  'min_stock', 'price');
        return Product::create($data);
    }

    public function update(ProductRequest $request, $id)
    {
        $user = $this->getById($id);
        $data = $request->only('name', 'merek',  'min_stock', 'price');
        return $user->update($data);
    }

    public function delete($id)
    {
        $user = $this->getById($id);
        return $user->delete();
    }
}

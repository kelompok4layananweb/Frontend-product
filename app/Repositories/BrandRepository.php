<?php

namespace App\Repositories;

use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandRepository
{
    public function datatables()
    {
        $data = Brand::query()
            ->latest();

        return \DataTables::eloquent($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn = '';

                $btn .= '<div class="flex space-x-3 rtl:space-x-reverse">';
                $btn .= '
                <div class="action-btn">
                    <a href="' . route('master.merek.edit', $row->id) . '" class="text-info edit">
                        <i class="ti ti-edit fs-5"></i>
                    </a>
                    <form action="' . route('master.merek.destroy', $row->id) . '" method="POST" class="d-inline-block">
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
        return Brand::findOrFail($id);
    }

    public function getByName($search)
    {
        return Brand::select('id', 'name')
            ->where('name', 'like', "%$search%")
            ->get();
    }

    public function store(Request $request)
    {
        return $request;
        $data = $request->only('name');

        return Brand::create($data);
    }

    public function update(BrandRequest $request, $id)
    {
        $user = $this->getById($id);
        $data = $request->only('name');
        return $user->update($data);
    }

    public function delete($id)
    {
        $user = $this->getById($id);
        return $user->delete();
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandRequest;
use App\Repositories\UnitRepository;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    protected $unitRepo;

    public function __construct(UnitRepository $unitRepo)
    {
        $this->unitRepo = $unitRepo;
    }

    public function index()
    {
        if (request()->ajax()) {
            return $this->unitRepo->datatables();
        }
        return view('pages.unit.index');
    }

    public function create()
    {
        return view('pages.unit.create');
    }

    public function store(BrandRequest $request)
    {
        $this->unitRepo->store($request);

        toastr()
            ->positionClass('toast-bottom-left')
            ->addSuccess('Jenis berhasil ditambah');

        return redirect()->route('master.jenis.index');
    }

    public function edit($id)
    {
        $unit = $this->unitRepo->getById($id);
        return view('pages.unit.edit', compact('unit'));
    }

    public function update(BrandRequest $request, $id)
    {
        $this->unitRepo->update($request, $id);

        toastr()
            ->positionClass('toast-bottom-left')
            ->addSuccess('Jenis berhasil diubah');

        return redirect()->route('master.jenis.index');
    }

    public function destroy($id)
    {
        $this->unitRepo->delete($id);

        toastr()
            ->positionClass('toast-bottom-left')
            ->addSuccess('Jenis berhasil dihapus');

        return redirect()->route('master.jenis.index');
    }
}

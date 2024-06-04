<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandRequest;
use App\Repositories\BrandRepository;
use App\View\Components\CreateAOForm;
use App\View\Components\CreateForm;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    protected $brandRepo;

    public function __construct(BrandRepository $brandRepo)
    {
        $this->brandRepo = $brandRepo;
    }

    public function index()
    {
        if (request()->ajax()) {
            return $this->brandRepo->datatables();
        }
        return view('pages.brand.index');
    }

    public function create()
    {
        return view('pages.brand.create');
    }

    public function store(BrandRequest $request)
    {
        $this->brandRepo->store($request);

        toastr()
            ->positionClass('toast-bottom-left')
            ->addSuccess('Merek berhasil ditambah');

        return redirect()->route('master.merek.index');
    }

    public function edit($id)
    {
        $brand = $this->brandRepo->getById($id);
        return view('pages.brand.edit', compact('brand'));
    }


    public function show($componentName)
{
    $validComponents = [
        'create-form1' => CreateForm::class,
        'create-form2' => CreateAOForm::class,
    ];

    if (!array_key_exists($componentName, $validComponents)) {
        abort(404);
    }

    return view('components.' . $componentName);
}

    public function update(BrandRequest $request, $id)
    {
        $this->brandRepo->update($request, $id);

        toastr()
            ->positionClass('toast-bottom-left')
            ->addSuccess('Merek berhasil diubah');

        return redirect()->route('master.merek.index');
    }

    public function destroy($id)
    {
        $this->brandRepo->delete($id);

        toastr()
            ->positionClass('toast-bottom-left')
            ->addSuccess('Merek berhasil dihapus');

        return redirect()->route('master.merek.index');
    }
}

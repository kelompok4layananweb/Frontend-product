<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandRequest;
use App\Models\Rfq;
use App\Repositories\RfqRepository;
use App\View\Components\CreateAOForm;
use App\View\Components\CreateForm;
use Illuminate\Http\Request;

class RfqController extends Controller
{
    protected $rfqrepo;

    public function __construct(RfqRepository $rfqrepo)
    {
        $this->rfqrepo = $rfqrepo;
    }

    public function index()
    {
        if (request()->ajax()) {
            return $this->rfqrepo->datatables();
        }
        $numbersWO = Rfq::select('number_wo')->distinct()->get();
        return view('pages.rfq.index',compact('numbersWO'));
    }

    public function create()
    {
        return view('pages.rfq.create');
    }

    public function store(Request $request)
    {
        // return $request;
        $this->rfqrepo->store($request);

        toastr()
            ->positionClass('toast-bottom-left')
            ->addSuccess('RFQ berhasil ditambah');

        return redirect()->route('project.rfq.index');
    }

    public function edit($id)
    {
        $brand = $this->rfqrepo->getById($id);
        return view('pages.rfq.edit', compact('brand'));
    }


    public function detail()
    {
        $series1 = 0;

        return view('pages.rfq.show', compact ('series1'));
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
        $this->rfqrepo->update($request, $id);

        toastr()
            ->positionClass('toast-bottom-left')
            ->addSuccess('RFQ berhasil diubah');

        return redirect()->route('project.rfq.index');
    }

    public function destroy($id)
    {
        $this->rfqrepo->delete($id);

        toastr()
            ->positionClass('toast-bottom-left')
            ->addSuccess('RFQ berhasil dihapus');

        return redirect()->route('project.rfq.index');
    }

}

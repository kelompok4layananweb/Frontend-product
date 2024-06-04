<?php

namespace App\Repositories;

use App\Http\Requests\LumpsumRfqRequest;
use App\Http\Requests\RfqRequest;
use App\Models\Rfq;
use App\Models\RfqDetail;
use Illuminate\Http\Request;

class RfqRepository
{
    public function datatables()
    {
        $data = Rfq::with('dataDetail');

        return \DataTables::eloquent($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn = '';

                $btn .= '<div class="flex space-x-3 rtl:space-x-reverse">';
                $btn .= '
                <div class="action-btn">
                    <a href="' . route('project.rfq.edit', $row->id) . '" class="text-info edit">
                        <i class="ti ti-edit fs-5"></i>
                    </a>
                    <a href="' . route('rfq.form') . '" class="text-info edit">
                    <i class="ti ti-eye fs-5"></i>
                </a>
                    <form action="' . route('project.rfq.destroy', $row->id) . '" method="POST" class="d-inline-block">
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
        return Rfq::findOrFail($id);
    }

    public function store(Request $request)
    {
        $agreementType = $request->input('agreement_type');
        $lupsumRfq = Rfq::create([
            'date' => $request->input('date'),
            'number_cr' => $request->input('number_cr'),
            'job' => $request->input('job'),
            'offer_number' => $request->input('offer_number'),
            'include_tax' => $request->input('include_tax'),
            'responsible' => $request->input('responsible'),
            'company' => $request->input('company'),
            'total_price'=> $request->input('total_price'),
            'name_hod' => $request->input('name_hod'),
            'agreement_type' => $agreementType,
        ]);
        $lupsumRfqId = $lupsumRfq->id;
        foreach ($request->input('description_job') as $index => $description_job) {
            RfqDetail::create([
                'description_job' => $description_job,
                'qty' => $request->input('qty')[$index],
                'price' => $request->input('price')[$index],
                'total' => $request->input('total')[$index],
                'description' => $request->input('description')[$index],
                'rfq_id' => $lupsumRfqId,
            ]);
        }
    }

    public function update(LumpsumRfqRequest $request, $id)
    {
        $user = $this->getById($id);
        $data = $request->only('name', 'brand_id', 'unit_id', 'min_stock', 'price', 'unit');
        return $user->update($data);
    }

    public function delete($id)
    {
        $user = $this->getById($id);
        return $user->delete();
    }
}

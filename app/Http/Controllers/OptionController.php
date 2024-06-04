<?php

namespace App\Http\Controllers;

use App\Repositories\BrandRepository;
use App\Repositories\UnitRepository;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    protected $brandRepo;
    protected $unitRepo;

    public function __construct(BrandRepository $brandRepo, UnitRepository $unitRepo)
    {
        $this->brandRepo = $brandRepo;
        $this->unitRepo = $unitRepo;
    }

    public function brand(Request $request)
    {
        $data = [];
        $search = $request->q ?? '';
        $data = $this->brandRepo->getByName($search);
        return response()->json($data);
    }

    public function unit(Request $request)
    {
        $data = [];
        $search = $request->q ?? '';
        $data = $this->unitRepo->getByName($search);
        return response()->json($data);
    }
}

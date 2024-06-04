<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function index()
    {
        if (request()->ajax()) {
            return $this->userRepo->datatables();
        }
        return view('pages.user.index');
    }

    public function create()
    {
        return view('pages.user.create');
    }

    public function store(UserStoreRequest $request)
    {
        $this->userRepo->store($request);

        toastr()
            ->positionClass('toast-bottom-left')
            ->addSuccess('Pengguna berhasil ditambah');

        return redirect()->route('user.index');
    }

    public function edit($id)
    {
        $user = $this->userRepo->getById($id);
        return view('pages.user.edit', compact('user'));
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $this->userRepo->update($request, $id);

        toastr()
            ->positionClass('toast-bottom-left')
            ->addSuccess('Pengguna berhasil diubah');

        return redirect()->route('user.index');
    }

    public function destroy($id)
    {
        $this->userRepo->delete($id);

        toastr()
            ->positionClass('toast-bottom-left')
            ->addSuccess('Pengguna berhasil dihapus');

        return redirect()->route('user.index');
    }
}

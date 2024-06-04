<?php

namespace App\Repositories;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;

class UserRepository
{
    public function datatables()
    {
        $data = User::query()
            ->where('id', '!=', auth()->user()->id)
            ->latest();

        return \DataTables::eloquent($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn = '';

                $btn .= '<div class="flex space-x-3 rtl:space-x-reverse">';
                $btn .= '
                <div class="action-btn">
                    <a href="' . route('user.edit', $row->id) . '" class="text-info edit">
                        <i class="ti ti-edit fs-5"></i>
                    </a>
                    <form action="' . route('user.destroy', $row->id) . '" method="POST" class="d-inline-block">
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
        return User::findOrFail($id);
    }

    public function store(UserStoreRequest $request)
    {
        $data = $request->only('name', 'email', 'role');
        $data['password'] = bcrypt($request->password);

        return User::create($data);
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $user = $this->getById($id);

        $data = $request->only('name', 'email', 'role');
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        return $user->update($data);
    }

    public function delete($id)
    {
        $user = $this->getById($id);
        return $user->delete();
    }
}

<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\User\UserRepository;

class EloquentUser implements UserRepository
{
    /**
     * {@inheritdoc}
     */
    public function all()
    {
        return User::all();
    }

    public function getUser()
    {
        return User::whereRole('user')->get();
    }

    /**
     * {@inheritdoc}
     */
    public function find($id)
    {
        return User::find($id);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        $user = User::create($data);

        return $user;
    }

    /**
     * {@inheritdoc}
     */
    public function update($id, array $data)
    {
        $user = $this->find($id);

        $user->update($data);

        return $user;
    }

    /**
     * {@inheritdoc}
     */
    public function delete($id)
    {
        $user = $this->find($id);

        return $user->delete();
    }

    /**
     * @param $perPage
     * @param null $status
     * @param null $searchFrom
     * @param $searchTo
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|mixed
     */
    public function paginate($perPage, $search = null, $status = null, $role = null)
    {
        $query = User::query();

        if ($status) {
            $query->where('status', $status);
        }
        if ($role) {
            $query->where('role', $role);
        }

        $result = $query->orderBy('id',  'desc')
            ->paginate($perPage);

        if ($search) {
            $result->appends(['search' => $search]);
        }
        return $result;
    }
}

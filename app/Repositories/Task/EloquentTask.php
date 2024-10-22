<?php

namespace App\Repositories\Task;

use App\Models\Task;
use App\Repositories\Task\TaskRepository;

class EloquentTask implements TaskRepository
{
    /**
     * {@inheritdoc}
     */
    public function all()
    {
        return Task::all();
    }

    public function getTaskByUser($id)
    {
        return Task::whereUserId($id)->get();
    }

    /**
     * {@inheritdoc}
     */
    public function find($id)
    {
        return Task::find($id);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        $Task = Task::create($data);

        return $Task;
    }

    /**
     * {@inheritdoc}
     */
    public function update($id, array $data)
    {
        $Task = $this->find($id);

        $Task->update($data);

        return $Task;
    }

    /**
     * {@inheritdoc}
     */
    public function delete($id)
    {
        $Task = $this->find($id);

        return $Task->delete();
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
        $query = Task::query();

        $result = $query->orderBy('id',  'desc')
            ->paginate($perPage);

        if ($search) {
            $result->appends(['search' => $search]);
        }
        return $result;
    }
}

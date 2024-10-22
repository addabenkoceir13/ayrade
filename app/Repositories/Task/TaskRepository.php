<?php

namespace App\Repositories\Task;

interface TaskRepository
{
    /**
     * Get all available Admin.
     * @return mixed
     */
    public function all();

    public function getTaskByUser($id);

    /**
     * {@inheritdoc}
     */
    public function create(array $data);

    /**
     * {@inheritdoc}
     */
    public function update($id, array $data);

    /**
     * {@inheritdoc}
     */
    public function delete($id);

    /**
     * Paginate Admin.
     *
     * @param $perPage
     * @param null $search
     * @param null $status
     * @return mixed
     */
    public function paginate($perPage, $search = null, $status = null , $role= null);
}

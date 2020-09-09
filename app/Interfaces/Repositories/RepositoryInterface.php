<?php

namespace App\Interfaces\Repositories;

interface RepositoryInterface
{
    /**
     * @return mixed
     */
    public function all();

    /**
     * @param int $id
     * @return mixed
     */
    public function find(int $id);

    /**
     * @param array $data
     */
    public function create(array $data);

    /**
     * @param int $id
     * @param array $data
     */
    public function update(int $id, array $data);

    /**
     * @param int $id
     */
    public function delete(int $id);
}

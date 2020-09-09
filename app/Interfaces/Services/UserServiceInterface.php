<?php

namespace App\Interfaces\Services;

interface UserServiceInterface
{
    /**
     * @param int $id
     * @return mixed
     */
    public function get(int $id);

    /**
     * @param int $id
     * @param string $password
     */
    public function changePassword(int $id, string $password);

    /**
     * @param int $id
     * @param array $data
     */
    public function edit(int $id, array $data);
}

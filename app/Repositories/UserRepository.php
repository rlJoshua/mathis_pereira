<?php

namespace App\Repositories;

use App\Interfaces\Repositories\RepositoryInterface;

class UserRepository extends Repository implements RepositoryInterface
{

    /**
     * UserRepository constructor.
     */
    public function __construct()
    {
        parent::__construct('users');
    }
}

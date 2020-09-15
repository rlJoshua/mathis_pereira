<?php

namespace App\Repositories;

use App\Interfaces\Repositories\RepositoryInterface;

class WorkRepository extends Repository implements RepositoryInterface
{
    /**
     * WorkRepository constructor.
     */
    public function __construct()
    {
        parent::__construct('works');
    }
}

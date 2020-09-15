<?php

namespace App\Services;

use App\Interfaces\Services\WorkServiceInterface;
use App\Repositories\WorkRepository;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;

class WorkService implements WorkServiceInterface
{
    /**
     * @var WorkRepository
     */
    protected $workRepository;

    /**
     * WorkService constructor.
     * @param WorkRepository $workRepository
     */
    public function __construct(WorkRepository $workRepository)
    {
        $this->workRepository = $workRepository;
    }

    /**
     * @return Collection|mixed
     */
    public function all()
    {
        return $this->workRepository->all();
    }

    /**
     * @param int $id
     * @return Builder|mixed
     */
    public function get(int $id)
    {
        return $this->workRepository->find($id);
    }

    /**
     * @param array $data
     * @return mixed|void
     */
    public function add(array $data)
    {
        $this->workRepository->create($data);
    }

    /**
     * @param int $id
     * @param array $data
     * @return mixed|void
     */
    public function edit(int $id, array $data)
    {
        $this->workRepository->update($id, $data);
    }

    /**
     * @param int $id
     * @return mixed|void
     */
    public function remove(int $id)
    {
        $this->workRepository->find($id);
    }
}

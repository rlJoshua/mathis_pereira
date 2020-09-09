<?php

namespace App\Repositories;

use App\Interfaces\Repositories\RepositoryInterface;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

abstract class Repository implements RepositoryInterface
{
    /**
     * @var Builder
     */
    protected $database;

    /**
     * Repository constructor.
     * @param string $table
     */
    public function __construct(string $table) {
        $this->database = DB::table($table);
    }

    /**
     * @return Collection|mixed
     */
    public function all()
    {
        return $this->database->get();
    }

    /**
     * @param int $id
     * @return Builder|mixed
     */
    public function find(int $id)
    {
        return $this->database->find($id);
    }

    /**
     * @param array $data
     */
    public function create(array $data)
    {
        $data['created_at'] = date('Y-m-d H:i:s', time());
        $data['updated_at'] = date('Y-m-d H:i:s', time());

        $this->database->insert($data);
    }

    /**
     * @param int $id
     * @param array $data
     */
    public function update(int $id, array $data)
    {
        $data['updated_at'] = date('Y-m-d H:i:s', time());

        $this->database->update($data);
    }

    /**
     * @param int $id
     */
    public function delete(int $id)
    {
        $this->database->delete($id);
    }
}

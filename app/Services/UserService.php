<?php

namespace App\Services;

use App\Interfaces\Services\UserServiceInterface;
use App\Repositories\UserRepository;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Hash;

class UserService implements UserServiceInterface
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * @var Hash
     */
    protected $hash;

    /**
     * UserService constructor.
     * @param UserRepository $userRepository
     * @param Hash $hash
     */
    public function __construct(UserRepository $userRepository, Hash $hash)
    {
        $this->userRepository = $userRepository;
        $this->hash = $hash;
    }

    /**
     * @param int $id
     * @return Builder|mixed
     */
    public function get(int $id)
    {
        return $this->userRepository->find($id);
    }

    /**
     * @param int $id
     * @param string $password
     */
    public function changePassword(int $id, string $password)
    {
        $hashedPassword = $this->hash::make($password);

        $this->userRepository->update($id, ['password' => $hashedPassword]);
    }

    /**
     * @param int $id
     * @param array $data
     */
    public function edit(int $id, array $data)
    {
        $this->userRepository->update($id, $data);
    }
}

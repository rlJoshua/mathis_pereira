<?php

use App\Repositories\UserRepository;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
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
     * UserSeeder constructor.
     * @param UserRepository $userRepository
     * @param Hash $hash
     */
    public function __construct(UserRepository $userRepository, Hash $hash){
        $this->userRepository = $userRepository;
        $this->hash = $hash;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->userRepository->create([
            'name' => 'Mathis Pereira',
            'email' => 'mathis.pereira2@orange.fr',
            'password' => $this->hash::make('pirator93')
        ]);
    }
}

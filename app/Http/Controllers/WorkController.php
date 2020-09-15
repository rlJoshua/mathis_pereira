<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WorkController extends Controller
{
    protected $userService;

    protected $validator;

    public function __construct(UserService $userService, Validator $validator)
    {
        $this->middleware('auth');
        $this->userService = $userService;
        $this->validator = $validator;
    }

    public function add()
    {
        // Get all years after 2013
        $years = [];
        $first = new \DateTime('2012-09-01');
        $interval = date_interval_create_from_date_string('1 years');

        for ($now = new \DateTime(); $now->diff($first)->y > 0;) {
            $first->add($interval);
            array_push($years, $first->format('Y'));
        }

        // Sort years descending
        $years = collect($years)->sortDesc();

        return view('work.add', ['years' => $years]);
    }

    public function addWork()
    {

    }
}

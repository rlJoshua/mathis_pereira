<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkRequest;
use App\Services\WorkService;
use App\Traits\PeriodTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class WorkController extends Controller
{
    protected $workService;

    protected $validator;

    protected $period;

    public function __construct(WorkService $workService, Validator $validator, PeriodTrait $period)
    {
        $this->workService = $workService;
        $this->validator = $validator;
        $this->period = $period;
    }

    public function add()
    {
        $this->middleware('auth');

        $years = $this->period->years();
        $months = $this->period->months();

        return view('work.add', [
            'months' => $months,
            'years' => $years
        ]);
    }

    public function addPost(WorkRequest $request)
    {
        $this->middleware('auth');

        // Get form and add rules
        $validator = $this->validator::make(
            $request->all(),
            $request->rules(),
            $request->messages()
        );

        // Check if form is valid
        if ($validator->fails()) {
            return redirect('work')
                ->withErrors($validator)
                ->withInput();
        }

        // Add data in database
        $date = new \DateTime($request->get('year').'/'.$request->get('month').'/01');

        $data = [
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'date' => $date,
            'post' => $request->get('post'),
            'user_id' => Auth::id()
        ];

        $this->workService->add($data);

        return redirect()->route('home');
    }

    public function show(int $id)
    {
        $work = $this->workService->get($id);

        return view('work.show', [
            'work' => $work
        ]);
    }
}

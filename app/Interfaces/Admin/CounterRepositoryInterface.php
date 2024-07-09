<?php

namespace App\Interfaces\Admin;

use App\Http\Requests\CounterUpdateRequest;

interface CounterRepositoryInterface {
    public function index();
    public function update(CounterUpdateRequest $request);
}

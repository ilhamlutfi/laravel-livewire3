<?php

namespace App\Services;

use App\Models\Todo;

class TodoService {

    public function store($data)
    {
        Todo::create($data);
        return;
    }
}

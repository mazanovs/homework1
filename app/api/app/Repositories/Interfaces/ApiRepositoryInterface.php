<?php

namespace App\Repositories\Interfaces;

use App\Models\Logs;

interface ApiRepositoryInterface
{
    public function all($count);
    public function save($params);
}
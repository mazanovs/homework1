<?php

namespace App\Repositories\Interfaces;

use App\Models\Logs;

interface ApiRepositoryInterface
{
    public function all(int $count);
    public function save(array $params);
}
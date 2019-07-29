<?php

namespace App\Repositories\Redis;

use App\Repositories\Contracts\UserRepositoryInterface;

class RedisUserRepository implements UserRepositoryInterface
{
    public function all()
    {
        return 'Get all product from Redis';
    }

    public function find($id)
    {
        return 'Get single product by id: ' . $id;
    }
}
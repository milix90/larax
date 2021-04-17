<?php

namespace Tests\Unit;

use App\Models\User;
use PHPUnit\Framework\TestCase;

class EmployeeTest extends TestCase
{
    public function test_create_new_user()
    {
        $user = new User();
        $user->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => '123123123',
        ]);

        $this->assertTrue(!!$user);
    }
}

<?php

namespace App\Tests;

use App\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testUserCreation(): void
    {
        $user = new User('1', 'Eduardo Galvez', 'egalvez@example.com', 'password123');
        
        $this->assertEquals('Eduardo Galvez', $user->getName());
        $this->assertTrue($user->verifyPassword('password123'));
    }
}

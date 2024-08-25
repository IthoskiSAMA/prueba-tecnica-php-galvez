<?php

namespace App\Tests;

use App\InMemoryUserRepository;
use App\User;
use App\Exception\UserDoesNotExistException;
use PHPUnit\Framework\TestCase;

class UserRepositoryTest extends TestCase
{
    private InMemoryUserRepository $userRepository;

    protected function setUp(): void
    {
        $this->userRepository = new InMemoryUserRepository();
    }

    public function testSaveUser(): void
    {
        $user = new User('1', 'Eduardo Galvez', 'egalvez@example.com', 'password123');
        $this->userRepository->save($user);

        $foundUser = $this->userRepository->findById('1');
        $this->assertEquals('Eduardo Galvez', $foundUser->getName());
    }

    public function testWhenUserIsNotFoundByIdErrorIsThrown(): void
    {
        $this->expectException(UserDoesNotExistException::class);
        $this->userRepository->findById('non-existent-id');
    }

    public function testUpdateNonExistentUserThrowsError(): void
    {
        $this->expectException(UserDoesNotExistException::class);

        $user = new User('non-existent-id', 'Eduardo Galvez', 'egalvez@example', 'password123');
        $this->userRepository->update($user);
    }

    public function testDeleteNonExistentUserThrowsError(): void
    {
        $this->expectException(UserDoesNotExistException::class);
        $this->userRepository->delete('non-existent-id');
    }
}

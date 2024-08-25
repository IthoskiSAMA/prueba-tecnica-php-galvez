<?php

namespace App\Tests;

use App\SaveUserUseCase;
use App\InMemoryUserRepository;
use PHPUnit\Framework\TestCase;

class SaveUserUseCaseTest extends TestCase
{
    private InMemoryUserRepository $userRepository;
    private SaveUserUseCase $saveUserUseCase;

    protected function setUp(): void
    {
        $this->userRepository = new InMemoryUserRepository();
        $this->saveUserUseCase = new SaveUserUseCase($this->userRepository);
    }

    public function testExecuteSavesUser(): void
    {
        $request = [
            'id' => '1',
            'name' => 'Eduardo Galvez',
            'email' => 'egalvez@example.com',
            'password' => 'password123',
        ];

        $this->saveUserUseCase->execute($request);

        $savedUser = $this->userRepository->findById('1');
        $this->assertEquals('Eduardo Galvez', $savedUser->getName());
    }
}

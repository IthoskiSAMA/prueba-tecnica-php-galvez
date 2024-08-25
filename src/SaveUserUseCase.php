<?php

namespace App;

class SaveUserUseCase
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(array $request): void
    {
        $user = new User($request['id'], $request['name'], $request['email'], $request['password']);
        $this->userRepository->save($user);
    }
}

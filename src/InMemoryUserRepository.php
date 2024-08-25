<?php

namespace App;

use App\Exception\UserDoesNotExistException;

class InMemoryUserRepository implements UserRepositoryInterface
{
    private array $users = [];

    public function save(User $user): void
    {
        $this->users[$user->getId()] = $user;
    }

    public function update(User $user): void
    {
        if (!isset($this->users[$user->getId()])) {
            throw new UserDoesNotExistException();
        }
        $this->users[$user->getId()] = $user;
    }

    public function delete(string $id): void
    {
        if (!isset($this->users[$id])) {
            throw new UserDoesNotExistException();
        }
        unset($this->users[$id]);
    }

    public function findById(string $id): ?User
    {
        if (!isset($this->users[$id])) {
            throw new UserDoesNotExistException();
        }
        return $this->users[$id];
    }
}

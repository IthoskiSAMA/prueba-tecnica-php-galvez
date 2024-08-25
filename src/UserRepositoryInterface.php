<?php

namespace App;

interface UserRepositoryInterface
{
    public function save(User $user): void;
    public function update(User $user): void;
    public function delete(string $id): void;
    public function findById(string $id): ?User;
}

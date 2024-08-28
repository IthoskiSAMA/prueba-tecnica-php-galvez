<?php

namespace App;

// Interfaz que define los métodos necesarios para manejar usuarios en un repositorio
interface UserRepositoryInterface
{
    // Método para guardar un nuevo usuario
    public function save(User $user): void;

    // Método para actualizar la información de un usuario existente
    public function update(User $user): void;

    // Método para eliminar un usuario por su ID
    public function delete(string $id): void;

    // Método para encontrar un usuario por su ID
    // Retorna un objeto User o null si no se encuentra
    public function findById(string $id): ?User;
}


<?php

namespace App;

// Importa la excepción personalizada para manejar el caso cuando un usuario no existe
use App\Exception\UserDoesNotExistException;

class InMemoryUserRepository implements UserRepositoryInterface
{
    // Almacena los usuarios en un arreglo (array) utilizando su ID como clave
    private array $users = [];

    // Método para guardar un nuevo usuario en el repositorio
    public function save(User $user): void
    {
        // Almacena el usuario en el arreglo usando su ID
        $this->users[$user->getId()] = $user;
    }

    // Método para actualizar un usuario existente en el repositorio
    public function update(User $user): void
    {
        // Verifica si el usuario existe en el repositorio
        if (!isset($this->users[$user->getId()])) {
            // Lanza una excepción si el usuario no existe
            throw new UserDoesNotExistException();
        }
        // Actualiza el usuario en el arreglo
        $this->users[$user->getId()] = $user;
    }

    // Método para eliminar un usuario del repositorio
    public function delete(string $id): void
    {
        // Verifica si el usuario existe en el repositorio
        if (!isset($this->users[$id])) {
            // Lanza una excepción si el usuario no existe
            throw new UserDoesNotExistException();
        }
        // Elimina el usuario del arreglo
        unset($this->users[$id]);
    }

    // Método para encontrar un usuario por su ID
    public function findById(string $id): ?User
    {
        // Verifica si el usuario existe en el repositorio
        if (!isset($this->users[$id])) {
            // Lanza una excepción si el usuario no existe
            throw new UserDoesNotExistException();
        }
        // Devuelve el usuario encontrado
        return $this->users[$id];
    }
}

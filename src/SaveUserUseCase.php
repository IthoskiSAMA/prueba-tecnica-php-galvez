<?php

namespace App;

class SaveUserUseCase
{
    // Interfaz del repositorio de usuarios que se utilizará para guardar el usuario
    private UserRepositoryInterface $userRepository;

    // Constructor que recibe el repositorio de usuarios como dependencia
    public function __construct(UserRepositoryInterface $userRepository)
    {
        // Inicializa el repositorio de usuarios
        $this->userRepository = $userRepository;
    }

    // Método que ejecuta el caso de uso para guardar un usuario
    public function execute(array $request): void
    {
        // Crea un nuevo objeto User utilizando los datos del arreglo de solicitud
        $user = new User($request['id'], $request['name'], $request['email'], $request['password']);
        
        // Guarda el nuevo usuario en el repositorio
        $this->userRepository->save($user);
    }
}

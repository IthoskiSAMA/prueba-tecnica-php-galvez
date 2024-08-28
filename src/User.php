<?php

namespace App;

class User
{
    // Propiedades privadas para almacenar la información del usuario
    private string $id;       // ID único del usuario
    private string $name;     // Nombre del usuario
    private string $email;    // Correo electrónico del usuario
    private string $password;  // Contraseña del usuario (almacenada de manera segura)

    // Constructor que inicializa las propiedades del usuario
    public function __construct(string $id, string $name, string $email, string $password)
    {
        // Asigna el ID, nombre y correo electrónico al usuario
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        // Almacena la contraseña de forma segura utilizando hashing
        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }

    // Método para obtener el ID del usuario
    public function getId(): string
    {
        return $this->id;
    }

    // Método para obtener el nombre del usuario
    public function getName(): string
    {
        return $this->name;
    }

    // Método para establecer un nuevo nombre para el usuario
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    // Método para obtener el correo electrónico del usuario
    public function getEmail(): string
    {
        return $this->email;
    }

    // Método para establecer un nuevo correo electrónico para el usuario
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    // Método para verificar si la contraseña proporcionada es correcta
    public function verifyPassword(string $password): bool
    {
        // Compara la contraseña proporcionada con la contraseña almacenada (hasheada)
        return password_verify($password, $this->password);
    }
}

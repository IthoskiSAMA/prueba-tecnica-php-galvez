<?php

namespace App\Tests;

use App\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    // Método de prueba para la creación de un usuario
    public function testUserCreation(): void
    {
        // Se crea un nuevo usuario con ID, nombre, correo electrónico y contraseña
        $user = new User('1', 'Eduardo Galvez', 'egalvez@example.com', 'password123');
        
        // Se verifica que el nombre del usuario sea correcto
        $this->assertEquals('Eduardo Galvez', $user->getName());
        
        // Se verifica que la contraseña proporcionada sea correcta
        $this->assertTrue($user->verifyPassword('password123'));
    }
}


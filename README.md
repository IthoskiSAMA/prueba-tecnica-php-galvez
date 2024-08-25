# Prueba Técnica PHP - Eduardo Alfredo Galvez Carmigniani

Este proyecto es una prueba técnica en PHP que implementa la creación de entidades, repositorios mediante interfaces, y un caso de uso para el guardado de usuarios. También incluye pruebas unitarias e integrales utilizando PHPUnit.

## Estructura del Proyecto

prueba-tecnica-php-eduardo/
│
├── src/
│   ├── User.php
│   ├── InMemoryUserRepository.php
│   ├── SaveUserUseCase.php
│   └── Exception/
│       └── UserDoesNotExistException.php
│
├── tests/
│   ├── UserTest.php
│   ├── UserRepositoryTest.php
│   └── SaveUserUseCaseTest.php
│
├── composer.json
└── README.md

## Instalación

1. **Clona el repositorio:**

   ```bash
   git clone https://github.com/tuusuario/prueba-tecnica-php-eduardo.git
   cd prueba-tecnica-php-eduardo
2. **Instala las dependencias usando Composer:**

   ```bash
   composer install
3. **Ejecuta las pruebas para asegurarte de que todo funciona correctamente:**

   ```bash
   vendor\bin\phpunit --bootstrap vendor\autoload.php tests

**Detalles Técnicos**
1. **Entidades y Repositorios**
La clase User representa un usuario en el sistema. El repositorio InMemoryUserRepository implementa la interfaz UserRepositoryInterface, permitiendo la persistencia de usuarios en memoria.

**Excepción Personalizada**
UserDoesNotExistException: Se lanza cuando se intenta acceder o modificar un usuario que no existe en el repositorio.
2. **Caso de Uso**
El caso de uso SaveUserUseCase maneja la lógica de negocio para guardar un nuevo usuario en el sistema.

3. **Pruebas**
Las pruebas se han implementado utilizando PHPUnit:

UserTest: Pruebas unitarias para la clase User.
UserRepositoryTest: Pruebas de integración para InMemoryUserRepository, incluyendo el manejo de excepciones.
SaveUserUseCaseTest: Pruebas unitarias para el caso de uso SaveUserUseCase.

![image](https://github.com/user-attachments/assets/b5cdeb54-fb91-4481-b287-2fa9957d5926)

Ejecución de Pruebas
Para ejecutar todas las pruebas, utiliza el siguiente comando:

```bash
vendor\bin\phpunit --bootstrap vendor\autoload.php tests








namespace App\Tests;

use App\InMemoryUserRepository; // Importa la clase del repositorio de usuarios en memoria
use App\User; // Importa la clase User
use App\Exception\UserDoesNotExistException; // Importa la excepción para usuario no encontrado
use PHPUnit\Framework\TestCase; // Importa la clase TestCase de PHPUnit

class UserRepositoryTest extends TestCase
{
    // Se declara una variable para el repositorio de usuarios en memoria
    private InMemoryUserRepository $userRepository;

    // Método que se ejecuta antes de cada prueba para configurar el entorno
    protected function setUp(): void
    {
        // Se inicializa el repositorio de usuarios en memoria
        $this->userRepository = new InMemoryUserRepository();
    }

    // Método de prueba que verifica que se guarda un usuario correctamente
    public function testSaveUser(): void
    {
        // Se crea una nueva instancia de User con los datos del usuario
        $user = new User('1', 'Eduardo Galvez', 'egalvez@example.com', 'password123');
        
        // Se guarda el usuario en el repositorio
        $this->userRepository->save($user);

        // Se busca el usuario guardado en el repositorio por su ID
        $foundUser = $this->userRepository->findById('1');
        
        // Se verifica que el nombre del usuario guardado coincide con el esperado
        $this->assertEquals('Eduardo Galvez', $foundUser->getName());
    }

    // Método de prueba que verifica que se lanza una excepción si el usuario no se encuentra por ID
    public function testWhenUserIsNotFoundByIdErrorIsThrown(): void
    {
        // Se espera que se lance una excepción de tipo UserDoesNotExistException
        $this->expectException(UserDoesNotExistException::class);
        
        // Se intenta buscar un usuario con un ID que no existe
        $this->userRepository->findById('non-existent-id');
    }

    // Método de prueba que verifica que se lanza una excepción al intentar actualizar un usuario que no existe
    public function testUpdateNonExistentUserThrowsError(): void
    {
        // Se espera que se lance una excepción de tipo UserDoesNotExistException
        $this->expectException(UserDoesNotExistException::class);

        // Se crea una nueva instancia de User con un ID que no existe
        $user = new User('non-existent-id', 'Eduardo Galvez', 'egalvez@example', 'password123');
        
        // Se intenta actualizar un usuario que no existe
        $this->userRepository->update($user);
    }

    // Método de prueba que verifica que se lanza una excepción al intentar eliminar un usuario que no existe
    public function testDeleteNonExistentUserThrowsError(): void
    {
        // Se espera que se lance una excepción de tipo UserDoesNotExistException
        $this->expectException(UserDoesNotExistException::class);
        
        // Se intenta eliminar un usuario con un ID que no existe
        $this->userRepository->delete('non-existent-id');
    }
}

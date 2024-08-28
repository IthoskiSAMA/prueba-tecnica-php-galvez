namespace App\Tests;

use App\SaveUserUseCase;
use App\InMemoryUserRepository;
use PHPUnit\Framework\TestCase;

class SaveUserUseCaseTest extends TestCase
{
    // Se declara una instancia del repositorio de usuarios en memoria
    private InMemoryUserRepository $userRepository;
    
    // Se declara una instancia del caso de uso para guardar usuarios
    private SaveUserUseCase $saveUserUseCase;

    // Método que se ejecuta antes de cada prueba
    protected function setUp(): void
    {
        // Se inicializa el repositorio de usuarios en memoria
        $this->userRepository = new InMemoryUserRepository();
        
        // Se inicializa el caso de uso para guardar usuarios con el repositorio
        $this->saveUserUseCase = new SaveUserUseCase($this->userRepository);
    }

    // Método de prueba que verifica que se guarda un usuario
    public function testExecuteSavesUser(): void
    {
        // Se define un arreglo de datos del usuario a guardar
        $request = [
            'id' => '1',
            'name' => 'Eduardo Galvez',
            'email' => 'egalvez@example.com',
            'password' => 'password123',
        ];

        // Se ejecuta el caso de uso para guardar el usuario
        $this->saveUserUseCase->execute($request);

        // Se busca el usuario guardado por su ID
        $savedUser = $this->userRepository->findById('1');
        
        // Se verifica que el nombre del usuario guardado es el esperado
        $this->assertEquals('Eduardo Galvez', $savedUser->getName());
    }
}


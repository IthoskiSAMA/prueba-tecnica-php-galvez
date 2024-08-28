namespace App\Tests;

use App\SaveUserUseCase;
use App\InMemoryUserRepository;
use PHPUnit\Framework\TestCase;

class SaveUserUseCaseTest extends TestCase
{
    // Se declara una variable para el repositorio de usuarios en memoria
    private InMemoryUserRepository $userRepository;
    
    // Se declara una variable para el caso de uso de guardar usuarios
    private SaveUserUseCase $saveUserUseCase;

    // Método que se ejecuta antes de cada prueba para configurar el entorno
    protected function setUp(): void
    {
        // Se inicializa el repositorio de usuarios en memoria
        $this->userRepository = new InMemoryUserRepository();
        
        // Se inicializa el caso de uso para guardar usuarios con el repositorio
        $this->saveUserUseCase = new SaveUserUseCase($this->userRepository);
    }

    // Método de prueba que verifica que se guarda un usuario correctamente
    public function testExecuteSavesUser(): void
    {
        // Se define un arreglo con los datos del usuario a guardar
        $request = [
            'id' => '1', // ID del usuario
            'name' => 'Eduardo Galvez', // Nombre del usuario
            'email' => 'egalvez@example.com', // Correo electrónico del usuario
            'password' => 'password123', // Contraseña del usuario
        ];

        // Se ejecuta el caso de uso para guardar el usuario
        $this->saveUserUseCase->execute($request);

        // Se busca el usuario guardado en el repositorio por su ID
        $savedUser = $this->userRepository->findById('1');
        
        // Se verifica que el nombre del usuario guardado coincide con el esperado
        $this->assertEquals('Eduardo Galvez', $savedUser->getName());
    }
}

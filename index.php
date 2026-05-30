<?php
// Configuración de cabeceras globales para la API
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Capturar la URL y el método HTTP
$requestMethod = $_SERVER["REQUEST_METHOD"];
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Enrutamiento simple para /api/perfiles
if ($requestUri === '/api/perfiles' || $requestUri === '/index.php') {
    
    switch ($requestMethod) {
        
        case 'POST':
            // -------------------------------------------------------------
            // 1. CREAR PERFIL (CANDIDATO) - Criterio de precisión e integridad
            // -------------------------------------------------------------
            $inputData = json_decode(file_get_contents("php://input"), true);
            
            // Validación básica de los datos requeridos por el negocio (CV Ciego)
            if (!isset($inputData['experiencia_laboral']) || !isset($inputData['habilidades'])) {
                http_response_code(400); // Bad Request 
                echo json_encode([
                    "status" => "error",
                    "message" => "Datos incompletos. Se requiere 'experiencia_laboral' y 'habilidades'."
                ]);
                break;
            }
            
            // Simulación de guardado exitoso
            http_response_code(201); // Created [cite: 57]
            echo json_encode([
                "status" => "success",
                "message" => "Perfil de candidato creado exitosamente (Formato CV Ciego).",
                "id" => rand(100, 999)
            ]);
            break;
            
        case 'GET':
            // -------------------------------------------------------------
            // 2. LEER PERFILES - Criterios de Optimización y Rendimiento
            // -------------------------------------------------------------
            
            // Inyección de Headers de Rendimiento (Exigido en Punto 5)
            header("X-RateLimit-Limit: 60"); // Límite de peticiones 
            header("X-RateLimit-Remaining: 58");
            header("Cache-Control: max-age=300, private"); // Estrategia de Caché 
            
            // Datos simulados que protegen la privacidad (Sin nombres, edad, ni comuna)
            $mockPerfiles = [
                [
                    "id" => 101,
                    "experiencia_laboral" => [
                        ["puesto" => "Production Operator", "anos" => 7]
                    ],
                    "habilidades" => ["Java Backend", "SQL Oracle", "Docker Orchestration"],
                    "certificaciones" => ["PHP Advanced Laravel"]
                ],
                [
                    "id" => 102,
                    "experiencia_laboral" => [
                        ["puesto" => "Desarrollador Fullstack", "anos" => 3]
                    ],
                    "habilidades" => ["Vue.js", "Laravel API", "Tailwind CSS"],
                    "certificaciones" => ["Scrum Master"]
                ]
            ];
            
            http_response_code(200); // OK [cite: 57]
            echo json_encode([
                "status" => "success",
                "results" => count($mockPerfiles),
                "data" => $mockPerfiles
            ]);
            break;
            
        default:
            http_response_code(405); // Method Not Allowed
            echo json_encode(["message" => "Método HTTP no permitido."]);
            break;
    }
} else {
    // Si la ruta no coincide
    http_response_code(404); // Not Found [cite: 57]
    echo json_encode(["message" => "Recurso no encontrado. Usa /api/perfiles"]);
}
?><?php echo '<h1>Backend ProviEmplea Corriendo</h1>'; ?>

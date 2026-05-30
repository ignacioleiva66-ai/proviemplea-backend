# ProviEmplea - Backend API & Documentación OpenAPI 🚀
> **Asignatura:** Desarrollo Backend  
> **Evaluación:** Evaluación Sumativa Unidad 3 (Caso Real ProviEmplea)  
> **Institución:** Instituto Profesional San Sebastián  

---

## 👥 Información del Equipo
* **Nombre del Equipo:** Grupo 4  
* **Integrantes:** * Ignacio Nicolás Leiva Cordero  
  * Monserratt Caterina Leal Lizana  
  * Fabiola Aracely Leal Compayante  

---

## 🛠️ Stack Tecnológico Institucional (Obligatorio)
* **Lenguaje de Backend:** PHP 8.2 (Estructura nativa orientada a objetos, desacoplada y lista para migración a controladores Laravel)
* **Contenedores de Entorno:** Docker & Docker Compose (Arquitectura multi-contenedor de aislamiento)
* **Servidor Web Local:** Apache 2.4 con módulo `mod_rewrite` habilitado para enrutamiento semántico REST
* **Motor de Documentación y Pruebas:** Swagger UI / OpenAPI Specification 3.0.3

---

## 📋 Descripción de la Solución (Enfoque de Currículum Ciego)
Este backend preliminar resuelve la problemática de **ProviEmplea**, una plataforma pionera de búsqueda inversa de empleo donde las empresas auditan el talento disponible. 

Para garantizar el cumplimiento estricto del requerimiento de **no discriminación arbitraria**, el modelo de datos de la API mitiga de raíz el acceso a metadatos sociodemográficos de los candidatos. Los esquemas JSON bloquean campos críticos como nombres, edad, género, fotografías o comunas de residencia, exponiendo exclusivamente vectores de competencias técnicas, años de experiencia comprobable, habilidades duras y certificaciones validadas.

---

## 🌐 Arquitectura de Contenedores y Puertos Locales

El entorno se encuentra orquestado mediante Docker para asegurar la paridad de entornos de desarrollo entre todos los miembros del equipo y la revisión docente:

* **`proviemplea_backend` (Puerto `8080`):** Servidor Apache que procesa el núcleo de la API en PHP. Cuenta con reglas de reescritura `.htaccess` encargadas de interceptar las URI semánticas y canalizarlas al controlador frontal `index.php`.
* **`proviemplea_swagger_ui` (Puerto `8081`):** Servidor Nginx aislado que consume el contrato de diseño dinámico `swagger.yaml` montado mediante volúmenes compartidos.

---

## 📝 Documentación de Operaciones CRUD & Endpoints

La especificación OpenAPI mapea de forma precisa el comportamiento del backend para los siguientes flujos de recursos:

### 1. Gestión de Perfiles de Candidatos (`/api/perfiles`)

| Método HTTP | Endpoint | Descripción de Negocio (CV Ciego) | Códigos de Estado Esperados |
| :--- | :--- | :--- | :--- |
| **`POST`** | `/api/perfiles` | Registra una nueva propuesta de talento en la vitrina. Valida la existencia obligatoria de competencias y experiencia estructurada. | `201 Created`, `400 Bad Request`, `500 Error` |
| **`GET`** | `/api/perfiles` | Permite a los reclutadores corporativos listar y filtrar la base de datos de candidatos sin sesgos sociodemográficos. | `200 OK`, `404 Not Found` |
| **`PUT`** | `/api/perfiles/{id}` | Actualización completa de la trayectoria laboral del candidato. | `200 OK`, `400 Bad Request`, `404 Not Found` |
| **`DELETE`**| `/api/perfiles/{id}` | Eliminación física o lógica del perfil de la vitrina activa. | `200 OK`, `404 Not Found` |

---

## ⚡ Criterios Avanzados de Optimización y Rendimiento (Punto 5)

Para alcanzar el máximo nivel de desempeño técnico (Sobresaliente), el backend inyecta metadatos y lógica transaccional de optimización en las cabeceras HTTP de respuesta:

1. **Estrategia de Caché del Lado del Cliente (`Cache-Control`):** Las peticiones de lectura masiva (`GET`) implementan directivas `max-age=300, private`. Esto reduce la latencia de respuesta en consultas idénticas por parte de las empresas y minimiza la carga transaccional sobre el servidor backend en consultas recurrentes de perfiles estáticos.
2. **Limitación de Tasa Adaptativa (`Rate Limiting`):** Se integran los headers de control `X-RateLimit-Limit` y `X-RateLimit-Remaining`. El sistema restringe las solicitudes a un máximo de 60 peticiones por minuto por cliente API corporativo. Esto previene ataques de denegación de servicio (DoS) y el raspado masivo de datos (*scraping*) por parte de bots automatizados no autorizados.

---

## 🚀 Instrucciones para Despliegue y Pruebas Locales

1. Asegúrese de que su terminal **Git Bash** se encuentre en el directorio raíz del proyecto descompromido.
2. Inicialice la infraestructura del stack ejecutando:
   ```bash
   docker compose up -d

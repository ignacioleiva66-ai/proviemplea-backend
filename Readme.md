[portada.bmp](https://github.com/user-attachments/files/28423814/portada.bmp)

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

## 🛠️ Stack Tecnológico Institucional
* **Lenguaje de Backend:** PHP 8.4 (Framework Laravel integrado)
* **Base de Datos:** MySQL 8.0
* **Contenedores de Entorno:** Docker & Docker Compose (Arquitectura multi-contenedor de aislamiento)
* **Servidor Web Local:** Apache 2.4 con módulo `mod_rewrite` habilitado
* **Motor de Documentación y Pruebas:** Swagger UI / OpenAPI Specification 3.0.3

---

## 📋 Descripción de la Solución (Enfoque de Currículum Ciego)
Este backend resuelve la problemática de **ProviEmplea**, una plataforma pionera de búsqueda inversa de empleo donde las empresas auditan el talento disponible. 

Para garantizar el cumplimiento estricto del requerimiento de **no discriminación arbitraria**, el modelo de datos de la API mitiga de raíz el acceso a metadatos sociodemográficos de los candidatos. Los esquemas JSON bloquean campos críticos como nombres, edad, género, fotografías o comunas de residencia, exponiendo exclusivamente vectores de competencias técnicas, años de experiencia comprobable, habilidades duras y certificaciones validadas.

---

## 🌐 Arquitectura de Contenedores y Puertos Locales

El entorno se encuentra orquestado mediante Docker para asegurar la paridad de entornos de desarrollo entre todos los miembros del equipo:

* **`proviemplea_backend` (Puerto `8080`):** Servidor Apache que procesa el núcleo de la API en Laravel PHP.
* **`proviemplea_db` (Puerto `3306`):** Servidor de base de datos MySQL.
* **`proviemplea_swagger_ui` (Puerto `8081`):** Servidor aislado que consume el contrato de diseño dinámico `swagger.yaml`.

---

## ⚡ Criterios Avanzados de Optimización y Rendimiento (Rúbrica U3)

Para alcanzar el máximo nivel de desempeño técnico (Sobresaliente), el backend inyecta metadatos y lógica transaccional de optimización en las cabeceras HTTP de respuesta:

1. **Estrategia de Caché del Lado del Cliente (`Cache-Control`):** Las peticiones de lectura masiva (`GET`) implementan directivas `max-age=300, public`. Esto reduce la latencia de respuesta en consultas idénticas por parte de las empresas.
2. **Limitación de Tasa Adaptativa (`Rate Limiting`):** Se integran headers de control para restringir las solicitudes a un máximo de 60 peticiones por minuto. Esto previene el raspado masivo de datos (*scraping*) por parte de bots.

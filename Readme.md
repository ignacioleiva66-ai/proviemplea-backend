# ProviEmplea - Backend API (Evaluación 3)

## 👥 Integrantes del Equipo
* **Nombre del Equipo:** [Grupo 4]
* **Miembros:** * [Ignacio Nicolas Leiva Cordero]
  * [Monserratt Caterina Leal Lizana]
  * [Fabiola Aracely Leal Compayante]

---

## 🚀 Stack Tecnológico Utilizado
* **Lenguaje:** PHP 8.2
* **Framework Backend sugerido/Estructura:** Arquitectura nativa de servicios API (preparado para integración Laravel)
* **Contenedores y Entorno:** Docker & Docker Compose
* **Servidor Web:** Apache con módulo `mod_rewrite` habilitado
* **Documentación de API:** Swagger UI (OpenAPI 3.0)

---

## 📋 Descripción del Proyecto (Caso ProviEmplea)
Desarrollo preliminar de Backend para la plataforma "ProviEmplea", una vitrina online orientada a la búsqueda inversa de empleo. Diseñado con un enfoque estricto de **Currículum Ciego** para mitigar la discriminación arbitraria en los procesos de reclutamiento (ocultando nombres, edad, género y comuna de residencia).

---

## 🛠️ Instrucciones de Levantamiento del Entorno (Docker)
Para ejecutar este proyecto de manera local, asegúrese de tener instalado Docker Desktop y ejecute los siguientes comandos en su terminal:

```bash
# 1. Clonar el repositorio
git clone [https://github.com/ignacioleiva66-ai/proviemplea-backend.git](https://github.com/ignacioleiva66-ai/proviemplea-backend.git)

# 2. Navegar al directorio
cd proviemplea-backend

# 3. Levantar los contenedores en segundo plano
docker compose up -d

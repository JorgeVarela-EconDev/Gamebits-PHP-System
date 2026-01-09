# 🎮 Gamebits - Sistema de Gestión de Videojuegos y Encuestas

**Sistema Web Full Stack** desarrollado con **PHP Nativo** y **MySQL** para la gestión de usuarios, administración de inventario de videojuegos y recolección de datos mediante encuestas dinámicas.

![PHP](https://img.shields.io/badge/Backend-PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/DB-MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![HTML5](https://img.shields.io/badge/Frontend-HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)

---

## 📂 Arquitectura del Proyecto

El proyecto está estructurado para facilitar el despliegue rápido en servidores locales o compartidos.

| Componente | Ubicación | Descripción |
| :--- | :--- | :--- |
| **Base de Datos** | `/database` | Contiene los scripts SQL (`login_register_db.sql`, `encuesta.sql`) necesarios para la instalación. |
| **Backend Core** | Raíz (`/`) | Archivos de lógica como `index.php` (Login), `principal.php` (Dashboard) y `consulta_general.php`. |
| **Frontend** | Raíz (`/`) | Estilos (`styles.css`) y scripts (`script.js`) integrados para la interfaz de usuario. |
| **Recursos** | `/images` | Activos gráficos y multimedia del sistema. |

---

## 🚀 Funcionalidades Clave

* **Autenticación Segura:** Sistema de Login y Registro de usuarios.
* **Gestión de Datos (CRUD):** Administración completa de videojuegos y categorías.
* **Módulo de Encuestas:** Sistema para la creación y visualización de encuestas dinámicas.
* **Reportes:** Visualización de listados y consultas generales.

---

## 🛠️ Guía de Instalación

1.  **Clonar/Descargar:** Descarga el repositorio en tu servidor local (carpeta `htdocs` en XAMPP o `www` en WAMP).
2.  **Base de Datos:**
    * Entra a **phpMyAdmin**.
    * Crea una base de datos nueva.
    * Importa los archivos `.sql` ubicados en la carpeta `/database`.
3.  **Conexión:**
    * Verifica que las credenciales (usuario/contraseña) en tus archivos de conexión PHP coincidan con tu servidor local.
4.  **Despliegue:**
    * Abre el navegador y ve a `http://localhost/Gamebits-PHP-System`.

---
*Desarrollado por [Jorge Varela](https://github.com/JorgeVarela-EconDev) - Portafolio Profesional.*

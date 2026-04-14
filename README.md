# Proyecto Web Fundación 
# Proyecto de Transformación Digital: Fundación El Señor de los Milagros

### *Fortaleciendo el impacto social a través de la tecnología*

---

## Sobre el Proyecto
Este desarrollo surge como una iniciativa estratégica en colaboración con el **Banco de Alimentos de Bogotá** para dotar a la **Fundación El Señor de los Milagros** de una plataforma digital sólida. 

En esta **Fase 1 (Frontend)**, el enfoque principal fue la creación de una identidad digital profesional, la visibilidad de la labor social y el diseño de una arquitectura de software escalable que permita el crecimiento institucional.

## Objetivos de la Plataforma
* **Visibilidad Institucional:** Proyectar la misión, visión y valores de la fundación al mundo.
* **Conexión Solidaria:** Facilitar canales de contacto para donantes, voluntarios y aliados estratégicos.
* **Arquitectura Escalable:** Estructurar el código bajo estándares de ingeniería para futuras integraciones de lógica de negocio y persistencia de datos.

## Stack Tecnológico & Metodología
Para garantizar un producto de alta calidad y fácil mantenimiento, se han utilizado:
* **Lenguaje Nativo:** HTML5, CSS3 y JavaScript.
* **Diseño:** UI/UX centrado en el usuario, prototipado para una navegación intuitiva.
* **Arquitectura:** Modular (Basada en carpetas de funcionalidades), permitiendo que el proyecto sea "Ready to Backend".

---

## 🟩 Fase 2: Backend, Persistencia y Patrón MVC (En ejecución)
El proyecto ha iniciado su segunda etapa, evolucionando hacia una **aplicación web dinámica híbrida** mediante la integración de lógica de servidor y bases de datos MySQL.

### Alcance y Modelo Híbrido
Se ha definido un alcance técnico específico para garantizar la integridad del sitio:
* **Persistencia Restringida:** El sistema solo permite la **actualización** de información en secciones clave (Contacto, Personal, Cifras). No se permite la creación o eliminación de secciones estructurales.
* **Gestión de Accesos (Roles):** - **SuperAdministrador (Desarrollador):** Control total de la infraestructura, base de datos y recuperación de credenciales.
    - **Editor (Perfil Único):** Usuario autorizado exclusivamente para la actualización de contenidos predefinidos a través de un panel protegido.
* **Seguridad de Sesiones:** Implementación de `session_start()` en PHP para asegurar que solo el perfil autorizado pueda acceder a las funciones de edición.

### Hitos de la Fase
* Migración de la estructura de archivos de `.html` a `.php`.
* Implementación de control de versiones mediante la rama `fase2-backend`.
* Configuración de entorno local en **XAMPP / Localhost**.
* Conexión segura a DB mediante **PDO** con sentencias preparadas para prevenir inyecciones SQL.
---
### **Backend (Lógica y Servidor)**
* **PHP 8.x:** Procesamiento de datos en el servidor y manejo de sesiones.
* **MySQL:** Sistema de gestión de base de datos relacional para la persistencia.
* **PDO (PHP Data Objects):** Capa de seguridad para la conexión y ejecución de consultas preparadas.

### **Entorno y Control de Versiones**
* **XAMPP:** Servidor local para pruebas de ejecución de PHP y gestión de base de datos.
* **Git / GitHub:** Control de versiones y despliegue continuo.
* **Visual Studio Code:** Entorno de desarrollo integrado (IDE).

---

## Estructura del Repositorio (Actualizada v2.0)
Adaptando el patrón **MVC**, el proyecto se organiza para separar la lógica de negocio de la interfaz:

```text
FSM-WEB/
├── assets/             # Multimedia: Imágenes de la labor social y logos
├── css/                # Estilos: Diseño visual y responsivo
├── js/                 # JavaScript: Lógica del cliente e interactividad
├── frontend/           # Vista: Lógica de la interfaz y componentes reutilizables
│   └── partes/         # Fragmentos de UI (.php) (Navbar, Footer, Menús)
├── backend/            # Servidor: Estructura de lógica de negocio y DB
│   ├── config/         # Conexión: Configuración segura de la DB (db.php)
│   ├── controllers/    # CONTROLADORES: Orquestan la actualización de datos
│   └── models/         # MODELO: Consultas SQL exclusivas de actualización (Update)
├── index.php           # Punto de entrada principal (Migrado de .html)
├── README.md           # Documentación técnica y social
├── robots.txt          # Configuración para motores de búsqueda
└── sitemap.xml         # Mapa del sitio para indexación

---

## 🚀 Proyección a Futuro
La implementación de este modelo híbrido y la arquitectura MVC garantizan tres pilares fundamentales para la Fundación:

* **Mantenibilidad:** Los cambios en los datos críticos de la plataforma se reflejan en tiempo real a través del panel administrativo, eliminando la necesidad de modificar el código fuente HTML para actualizaciones rutinarias.
* **Seguridad:** Aislamiento total de las credenciales de acceso y la lógica de negocio en el lado del servidor, protegiendo la información sensible de la institución.
* **Integridad:** Al restringir las capacidades de edición solo a campos específicos, se protege la estructura visual y la identidad digital diseñada en la Fase 1 frente a cambios accidentales.

---

## ✒️ Desarrollado por:
* **Fase 1 (Frontend):** [Angie Lorena Arias Vasquez](https://github.com/Anngiw) - *Estudiante de Ingeniería de Software (3er Semestre), Uniempresarial, Bogotá.*
* **Fase 2 (Backend & Seguridad):** [Angie Lorena Arias Vasquez](https://github.com/Anngiw) - *Implementación de Arquitectura Híbrida y Persistencia con PHP/MySQL.*

---
*Este proyecto forma parte del programa de fortalecimiento digital en colaboración con el **Banco de Alimentos de Bogotá**.*
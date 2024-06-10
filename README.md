# E-commerce: Proyecto para las materias de Desarrollo Front-End y Desarrollo Back-End

## Descripción del Proyecto

El proyecto se enfoca en el desarrollo de un e-commerce mediante tecnologías web como PHP y HTML, con la implementación del patrón de diseño Modelo-Vista-Controlador (MVC). Este e-commerce actúa como plataforma educativa para los estudiantes de las materias mencionadas, permitiéndoles aplicar sus conocimientos teóricos en un entorno práctico y realista.

## Objetivos

- **Aprendizaje de Desarrollo Front-End y Back-End:** Los estudiantes aplicarán conceptos y técnicas aprendidas en las materias de Desarrollo Front-End y Back-End en un proyecto real.
- **Desarrollo de un E-commerce Funcional:** El objetivo principal es desarrollar un e-commerce completamente funcional que permita a los usuarios navegar por productos, agregar artículos al carrito de compras y realizar pagos.

## Tecnologías Utilizadas

- **PHP:** Lenguaje principal para el desarrollo del back-end del e-commerce.
- **HTML:** Utilizado para la estructura y contenido de las páginas web.
- **CSS:** Se asume su uso para el diseño y estilizado de las páginas.
- **JavaScript:** Opcionalmente, para agregar interactividad y dinamismo a la aplicación web.

## Tecnologías Necesarias

- 🐘 **PHP:** Lenguaje de programación para el desarrollo del lado del servidor.
- 🐬 **MySQL:** Sistema de gestión de bases de datos.
- 🐱 **XAMPP:** Paquete de software que incluye Apache, MySQL, PHP y Perl.
- 🌐 **Navegador Web:** Para acceder y probar la aplicación (por ejemplo, Chrome, Firefox).
- 📦 **Composer:** Administrador de dependencias para PHP.
- 📧 **PHPMailer:** Librería para el envío de correos electrónicos desde PHP.

## Funcionalidades Principales

1. **Registro de Usuarios:** Los usuarios pueden registrarse proporcionando información básica como correo electrónico y contraseña.
2. **Inicio de Sesión:** Los usuarios registrados pueden iniciar sesión utilizando su correo electrónico y contraseña.
3. **Exploración de Productos:** Navegación por el catálogo de productos disponibles.
4. **Carrito de Compras:** Agregar, modificar y eliminar productos del carrito de compras.
5. **Proceso de Pago:** Realizar pagos utilizando métodos de pago seguros.
6. **Imprimir:** Los administradores pueden imprimir en pdf el detalle de cada módulo del e-commerce.

## Base de Datos

La base de datos se configura en el archivo bbdd, creando tablas y el usuario administrador en la primera ejecución.

## Instrucciones para la Configuración Inicial del Proyecto

## Requisitos Previos

1. **Servidor Web Local:** Asegúrate de tener XAMPP instalado en tu sistema. XAMPP incluye Apache, MySQL, PHP y Perl, que son necesarios para ejecutar el proyecto.

## Pasos para la Configuración Inicial

### 1. Descargar el Proyecto

Descarga el proyecto desde el repositorio correspondiente. Esto puede ser mediante una descarga directa del archivo comprimido (.zip) o mediante un clon del repositorio usando Git.

### 2. Colocar el Proyecto en `htdocs`

Una vez descargado el proyecto, descomprime el archivo si es necesario y coloca la carpeta del proyecto en el directorio `htdocs` de XAMPP. El directorio `htdocs` se encuentra generalmente en la ubicación siguiente:

- En Windows: `C:\xampp\htdocs`
- En macOS: `/Applications/XAMPP/htdocs`
- En Linux: `/opt/lampp/htdocs`

### 3. Iniciar XAMPP

Inicia el Panel de Control de XAMPP y asegúrate de que los servicios de Apache y MySQL estén ejecutándose.

### 4. Crear la Base de Datos y el Usuario

Al iniciar la aplicación por primera vez, se ejecutará un script de inicialización que creará la base de datos, las tablas necesarias y los usuarios por defecto. Este script también insertará datos de prueba en la base de datos.

#### Usuarios por Defecto

- **Administrador:**
  - Correo electrónico: `admin@admin.com`
  - Contraseña: `1234`

- **Cliente de Prueba:**
  - Correo electrónico: `cliente@cliente.com`
  - Contraseña: `1234`

### 5. Ejecutar el Script de Inicialización

Al acceder a la aplicación por primera vez desde el navegador, se ejecutará un script que se encargará de:

1. **Crear la Base de Datos:** Si no existe, se creará la base de datos definida en la configuración del proyecto.
2. **Crear las Tablas:** Se crearán todas las tablas necesarias para el funcionamiento de la aplicación.
3. **Insertar Datos de Prueba:** Se insertarán los datos de prueba, incluyendo los usuarios mencionados anteriormente.

#### Acceder a la Aplicación

Para acceder a la aplicación, abre tu navegador web y dirígete a:

```http://localhost/nombre_del_proyecto```

Sustituye `nombre_del_proyecto` con el nombre de la carpeta que contiene tu proyecto en `htdocs`.

### 6. Configuración Adicional (Opcional)

En caso de necesitar configuraciones adicionales como la conexión a bases de datos externas, ajustes en la configuración de PHP o Apache, asegúrate de realizar los cambios necesarios en los archivos de configuración correspondientes.

## Conclusión

El proyecto proporciona a los estudiantes una valiosa experiencia práctica en Desarrollo Front-End y Back-End. Además, fomenta el trabajo colaborativo, la gestión de proyectos y la resolución de problemas reales en el desarrollo de aplicaciones web.

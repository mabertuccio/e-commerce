# E-commerce: Proyecto para las materias de Desarrollo Front-End y Desarrollo Back-End

## Descripción del Proyecto

El proyecto consistirá en el desarrollo de un e-commerce utilizando tecnologías web como PHP y HTML, con la implementación del patrón de diseño Modelo-Vista-Controlador (MVC). Este e-commerce servirá como plataforma de aprendizaje para los estudiantes de las materias mencionadas, brindándoles la oportunidad de aplicar los conocimientos teóricos adquiridos en un entorno práctico y realista.

## Objetivos

- **Aprendizaje de Desarrollo Front-End y Back-End:** Los estudiantes tendrán la oportunidad de aplicar conceptos y técnicas aprendidas en las materias de Desarrollo Front-End y Back-End en un proyecto real.
- **Implementación de MVC:** Se buscará que los estudiantes comprendan y apliquen el patrón de diseño Modelo-Vista-Controlador (MVC) para organizar y estructurar el código de manera eficiente y mantenible.
- **Desarrollo de un E-commerce Funcional:** El objetivo final es desarrollar un e-commerce completamente funcional que permita a los usuarios navegar por productos, agregar artículos al carrito de compras, realizar pagos y gestionar sus pedidos.

## Tecnologías Utilizadas

- **PHP:** Será el lenguaje principal utilizado para el desarrollo del back-end del e-commerce.
- **HTML:** Se empleará para la creación de la estructura y contenido de las páginas web.
- **CSS:** Aunque no se menciona explícitamente, se asume que se utilizará CSS para el diseño y estilizado de las páginas.
- **JavaScript:** Opcionalmente, se podría utilizar JavaScript para agregar interactividad y dinamismo a la aplicación web.

## Funcionalidades Principales

1. **Registro de Usuarios:** Los usuarios podrán registrarse en la plataforma proporcionando información básica como nombre, dirección de correo electrónico y contraseña.
2. **Inicio de Sesión:** Los usuarios registrados podrán iniciar sesión en sus cuentas utilizando su correo electrónico y contraseña.
3. **Exploración de Productos:** Los usuarios podrán navegar por el catálogo de productos disponibles en el e-commerce, filtrarlos por categorías y realizar búsquedas.
4. **Carrito de Compras:** Los usuarios podrán agregar productos al carrito de compras, modificar las cantidades y eliminar productos.
5. **Proceso de Pago:** Una vez que los usuarios hayan seleccionado los productos deseados, podrán proceder al proceso de pago utilizando métodos de pago seguros.
6. **Gestión de Pedidos:** Los usuarios podrán ver el historial de pedidos realizados, verificar el estado de los mismos y realizar seguimiento del envío.
7. **Imprimir Compras:** Los usuarios podrán imprimir en pdf el detalle del pedido realizado.

## Organización del Proyecto

El proyecto se organizará en base al patrón de diseño Modelo-Vista-Controlador (MVC), donde:

- **Modelo:** Se encargará de gestionar los datos y la lógica de negocio.
- **Vista:** Será responsable de la presentación de la interfaz de usuario.
- **Controlador:** Actuará como intermediario entre el modelo y la vista, gestionando las solicitudes del usuario y coordinando las acciones correspondientes.

## Base de datos

```
-- Tabla de usuarios
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(100) NOT NULL,
    tipo_usuario VARCHAR(50) NOT NULL,
    estado TINYINT NOT NULL DEFAULT 1, -- 1 para activo, 0 para inactivo
    CHECK (tipo_usuario IN ('Cliente', 'Vendedor'))
);

-- Tabla de proveedores
CREATE TABLE proveedores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    direccion VARCHAR(255),
    email VARCHAR(100),
    estado TINYINT NOT NULL DEFAULT 1 -- 1 para activo, 0 para inactivo
);

-- Tabla de proveedores
CREATE TABLE proveedores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    direccion VARCHAR(255),
    estado TINYINT NOT NULL DEFAULT 1 -- 1 para activo, 0 para inactivo
);
-- Tabla de productos
CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    imagen VARCHAR(255),
    precio DECIMAL(10, 2) NOT NULL,
    cantidad INT NOT NULL,
    estado TINYINT NOT NULL DEFAULT 1, -- 1 para activo, 0 para inactivo
    id_proveedor INT,
    FOREIGN KEY (id_proveedor) REFERENCES proveedores(id)
);

-- Tabla de pagos
CREATE TABLE pagos (
    id_pago INT AUTO_INCREMENT PRIMARY KEY,
    tipo VARCHAR(50) NOT NULL,
    numero_tarjeta VARCHAR(16) NOT NULL,
    fecha_vencimiento DATE NOT NULL,
    DNI VARCHAR(50) NOT NULL,
    nombre_en_tarjeta VARCHAR(50) NOT NULL
);

-- Tabla de facturas
CREATE TABLE facturas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fecha DATE NOT NULL,
    id_usuario INT NOT NULL,
    precio_total DECIMAL(10, 2) NOT NULL,
    id_pago INT,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id),
    FOREIGN KEY (id_pago) REFERENCES Pagos(id_pago)
);

-- Tabla de items de factura
CREATE TABLE items_factura (
    id_item INT AUTO_INCREMENT PRIMARY KEY,
    id_factura INT NOT NULL,
    id_producto INT NOT NULL,
    cantidad INT NOT NULL,
    precio_unitario DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (id_factura) REFERENCES facturas(id),
    FOREIGN KEY (id_producto) REFERENCES productos(id)
);



-- Generación de datos aleatorios
INSERT INTO usuarios (user, pass, type_varchar, email)
VALUES
    ('usuario1@example.com', 1, 'Vendedor'),
    ('usuario2@example.com', 2, 'Cliente'),
    ('usuario3@example.com', 3, 'Vendedor'),
    ('usuario4@example.com', 4, 'Cliente'),
    ('usuario5@example.com',5 ,'Vendedor');

INSERT INTO proveedores (nombre, direccion, email)
VALUES
    ('Proveedor 1', 'Dirección del Proveedor 1', 'proveedor1@example.com'),
    ('Proveedor 2', 'Dirección del Proveedor 2', 'proveedor2@example.com'),
    ('Proveedor 3', 'Dirección del Proveedor 3', 'proveedor3@example.com'),
    ('Proveedor 4', 'Dirección del Proveedor 4', 'proveedor4@example.com'),
    ('Proveedor 5', 'Dirección del Proveedor 5', 'proveedor5@example.com');

INSERT INTO proveedores (nombre, direccion)
VALUES
    ('Proveedor 1', 'Dirección del Proveedor 1' ),
    ('Proveedor 2', 'Dirección del Proveedor 2' ),
    ('Proveedor 3', 'Dirección del Proveedor 3' ),
    ('Proveedor 4', 'Dirección del Proveedor 4' ),
    ('Proveedor 5', 'Dirección del Proveedor 5');

INSERT INTO productos (nombre, descripcion, imagen, precio, cantidad, estado, id_proveedor)
VALUES
    ('Producto 1', 'Descripción del producto 1', 'imagen.jpg', 10.99, 100, 1, 1),
    ('Producto 2', 'Descripción del producto 2', 'imagen.jpg', 20.49, 50, 1, 2),
    ('Producto 3', 'Descripción del producto 3', 'imagen.jpg', 15.75, 75, 1, 3),
    ('Producto 4', 'Descripción del producto 4', 'imagen.jpg', 5.25, 200, 1, 4),
    ('Producto 5', 'Descripción del producto 5', 'imagen.jpg', 30.00, 25, 1, 5);

INSERT INTO pagos (tipo, numero_tarjeta, fecha_vencimiento, cvv)
VALUES
    ('Tarjeta de Crédito', '1234567812345678', '2026-04-01', '123'),
    ('Tarjeta de Crédito', '9876543298765432', '2025-05-01', '456'),
    ('Tarjeta de Débito', '1111222233334444', '2025-06-01', '789'),
    ('PayPal', 'paypal@example.com', '2025-07-01', '321'),
    ('Transferencia Bancaria', 'Banco X, Cuenta Y', '2025-08-01', '654');
INSERT INTO facturas (fecha, id_usuario, precio_total, id_pago)
VALUES
    ('2024-04-23', 1, 100.00, 1),
    ('2024-04-23', 2, 75.50, 2),
    ('2024-04-23', 3, 200.25, 3),
    ('2024-04-23', 4, 50.00, 4),
    ('2024-04-23', 5, 300.00, 5);

INSERT INTO items_factura (id_factura, id_producto, cantidad, precio_unitario)
VALUES
    (1, 1, 2, 10.99),
    (1, 2, 1, 20.49),
    (2, 3, 3, 15.75),
    (3, 4, 10, 5.25),
    (4, 5, 1, 30.00);
```

## Conclusiones

El desarrollo de este proyecto permitirá a los estudiantes de las materias de Desarrollo Front-End y Back-End aplicar sus conocimientos en un contexto práctico y relevante. Además, les proporcionará experiencia en el trabajo colaborativo, la gestión de proyectos y la resolución de problemas reales en el desarrollo de aplicaciones web.

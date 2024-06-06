<?php
function crearTablas($conn)
{
    try {
        // Crear las tablas necesarias
        $crearTablaUsuarios = "CREATE TABLE IF NOT EXISTS usuarios (
            id INT AUTO_INCREMENT PRIMARY KEY,
            email VARCHAR(50) NOT NULL UNIQUE,
            password VARCHAR(100) NOT NULL,
            tipo_usuario ENUM('Cliente', 'Vendedor') NOT NULL,
            estado TINYINT NOT NULL DEFAULT 1 -- 1 para activo, 0 para inactivo
        ) ENGINE=INNODB;";
        // Ejecutar las consultas de creación de tabla
        $conn->exec($crearTablaUsuarios);
        // Ejecutar las otras consultas de creación de tabla...
    } catch (PDOException $e) {
        // Manejar errores de creación de tabla
        echo 'Error al crear tablas: ' . $e->getMessage();
    }

    try {
        $crearTablaProveedores = "CREATE TABLE IF NOT EXISTS proveedores (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nombre VARCHAR(100) NOT NULL,
            direccion VARCHAR(255),
            estado TINYINT NOT NULL DEFAULT 1 -- 1 para activo, 0 para inactivo
        );";
        // Ejecutar las consultas de creación de tabla
        $conn->exec($crearTablaProveedores);
        // Ejecutar las otras consultas de creación de tabla...
    } catch (PDOException $e) {
        // Manejar errores de creación de tabla
        echo 'Error al crear tablas: ' . $e->getMessage();
    }

    try {

        $crearTablaProductos = "CREATE TABLE IF NOT EXISTS productos (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nombre VARCHAR(100) NOT NULL,
            descripcion TEXT,
            imagen VARCHAR(255),
            precio DECIMAL(10, 2) NOT NULL,
            cantidad INT NOT NULL,
            estado TINYINT NOT NULL DEFAULT 1, -- 1 para activo, 0 para inactivo
            id_proveedor INT,
            FOREIGN KEY (id_proveedor) REFERENCES proveedores(id)
        );";
        // Ejecutar las consultas de creación de tabla
        $conn->exec($crearTablaProductos);
        // Ejecutar las otras consultas de creación de tabla...
    } catch (PDOException $e) {
        // Manejar errores de creación de tabla
        echo 'Error al crear tablas: ' . $e->getMessage();
    }

    try {
        $crearTablaPagos = "CREATE TABLE IF NOT EXISTS pagos (
            id_pago INT AUTO_INCREMENT PRIMARY KEY,
            dni VARCHAR(50) NOT NULL,
            nombre_en_tarjeta VARCHAR(50) NOT NULL,
            tipo VARCHAR(50) NOT NULL,
            numero_tarjeta VARCHAR(16) NOT NULL,
            fecha_vencimiento DATE NOT NULL
        )";
        // Ejecutar las consultas de creación de tabla
        $conn->exec($crearTablaPagos);
        // Ejecutar las otras consultas de creación de tabla...
    } catch (PDOException $e) {
        // Manejar errores de creación de tabla
        echo 'Error al crear tablas: ' . $e->getMessage();
    }

    try {

        $crearTablaFacturas = "CREATE TABLE IF NOT EXISTS facturas (
            id INT AUTO_INCREMENT PRIMARY KEY,
            fecha DATE NOT NULL,
            id_usuario INT NOT NULL,
            precio_total DECIMAL(10, 2) NOT NULL,
            id_pago INT,
            FOREIGN KEY (id_usuario) REFERENCES usuarios(id),
            FOREIGN KEY (id_pago) REFERENCES pagos(id_pago)
        )";
        // Ejecutar las consultas de creación de tabla
        $conn->exec($crearTablaFacturas);
        // Ejecutar las otras consultas de creación de tabla...
    } catch (PDOException $e) {
        // Manejar errores de creación de tabla
        echo 'Error al crear tablas: ' . $e->getMessage();
    }

    try {
        $crearTablaItemsFactura = "CREATE TABLE IF NOT EXISTS items_factura (
            id_item INT AUTO_INCREMENT PRIMARY KEY,
            id_factura INT NOT NULL,
            id_producto INT NOT NULL,
            cantidad INT NOT NULL,
            precio_unitario DECIMAL(10, 2) NOT NULL,
            FOREIGN KEY (id_factura) REFERENCES facturas(id),
            FOREIGN KEY (id_producto) REFERENCES productos(id)
        ) ENGINE=INNODB;";

        // Ejecutar las consultas de creación de tabla
        $conn->exec($crearTablaItemsFactura);
        // Ejecutar las otras consultas de creación de tabla...
    } catch (PDOException $e) {
        // Manejar errores de creación de tabla
        echo 'Error al crear tablas: ' . $e->getMessage();
    }
}

// Función para generar datos de prueba
function generarDatosPrueba($conn)
{
    // Generación de datos aleatorios
    $insertarUsuarios = "INSERT INTO usuarios (email, password, tipo_usuario) VALUES
         ('usuario1@example.com', :password1, 'Vendedor'),
         ('usuario2@example.com', :password2, 'Cliente'),
         ('usuario3@example.com', :password3, 'Vendedor'),
         ('usuario4@example.com', :password4, 'Cliente'),
         ('usuario5@example.com', :password5, 'Vendedor');";

    $stmt = $conn->prepare($insertarUsuarios);
    $stmt->execute([
        ':password1' => password_hash('password1', PASSWORD_BCRYPT),
        ':password2' => password_hash('password2', PASSWORD_BCRYPT),
        ':password3' => password_hash('password3', PASSWORD_BCRYPT),
        ':password4' => password_hash('password4', PASSWORD_BCRYPT),
        ':password5' => password_hash('password5', PASSWORD_BCRYPT)
    ]);

    $insertarProveedores = "INSERT INTO proveedores (nombre, direccion, estado) VALUES
         ('Proveedor 1', 'Dirección del Proveedor 1', 1),
         ('Proveedor 2', 'Dirección del Proveedor 2', 1),
         ('Proveedor 3', 'Dirección del Proveedor 3', 1),
         ('Proveedor 4', 'Dirección del Proveedor 4', 1),
         ('Proveedor 5', 'Dirección del Proveedor 5', 1);";

    $conn->exec($insertarProveedores);

    $insertarProductos = "INSERT INTO productos (nombre, descripcion, imagen, precio, cantidad, estado, id_proveedor) VALUES
         ('Producto 1', 'Descripción del producto 1', 'imagen.jpg', 10.99, 100, 1, 1),
         ('Producto 2', 'Descripción del producto 2', 'imagen.jpg', 20.49, 50, 1, 2),
         ('Producto 3', 'Descripción del producto 3', 'imagen.jpg', 15.75, 75, 1, 3),
         ('Producto 4', 'Descripción del producto 4', 'imagen.jpg', 5.25, 200, 1, 4),
         ('Producto 5', 'Descripción del producto 5', 'imagen.jpg', 30.00, 25, 1, 5);";

    $conn->exec($insertarProductos);

    $insertarPagos = "INSERT INTO pagos (dni, nombre_en_tarjeta, tipo, numero_tarjeta, fecha_vencimiento) VALUES
         ('123456789', 'Juan Perez', 'Tarjeta de Crédito', '1234567812345678', '2026-04-01'),
         ('987654321', 'María García', 'Tarjeta de Crédito', '9876543298765432', '2025-05-01'),
         ('111111111', 'Pedro Rodriguez', 'Tarjeta de Débito', '1111222233334444', '2025-06-01'),
         ('222222222', 'Ana Martínez', 'PayPal', 'paypal@example.com', '2025-07-01'),
         ('333333333', 'Luis González', 'Transferencia Bancaria', 'Banco X, Cuenta Y', '2025-08-01');";

    $conn->exec($insertarPagos);

    $insertarFacturas = "INSERT INTO facturas (fecha, id_usuario, precio_total, id_pago) VALUES
         ('2024-04-23', 1, 100.00, 1),
         ('2024-04-23', 2, 75.50, 2),
         ('2024-04-23', 3, 200.25, 3),
         ('2024-04-23', 4, 50.00, 4),
         ('2024-04-23', 5, 300.00, 5);";

    $conn->exec($insertarFacturas);

    $insertarItemsFactura = "INSERT INTO items_factura (id_factura, id_producto, cantidad, precio_unitario) VALUES
         (1, 1, 2, 10.99),
         (1, 2, 1, 20.49),
         (2, 3, 3, 15.75),
         (3, 4, 10, 5.25),
         (4, 5, 1, 30.00);";

    $conn->exec($insertarItemsFactura);
}

// Función para crear el usuario administrador si no existe
function crearUsuarioAdmin($conn)
{
    $email = 'admin@admin.com';
    $password = '1234';

    $stmt = $conn->prepare("SELECT COUNT(*) FROM usuarios WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $userExists = $stmt->fetchColumn();

    if (!$userExists) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $conn->prepare("INSERT INTO usuarios (email, password, tipo_usuario) VALUES (:email, :password, 'Vendedor')");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);

        if ($stmt->execute()) {
            echo "Usuario administrador creado exitosamente.";
        } else {
            echo "Error al crear el usuario administrador.";
        }
    } else {
        echo "El usuario administrador ya existe.";
    }
}

<?php
// Archivo de prueba avanzado para verificar la conexión a la base de datos
echo "<h2>Prueba avanzada de conexión a la base de datos</h2>";

// Diferentes configuraciones a probar
$configs = [
    [
        'name' => 'Configuración 1 (localhost)',
        'host' => 'localhost',
        'user' => 'fcoalder_sensea',
        'pass' => 'Sensea2025',
        'db' => 'fcoalder_SENSEA'
    ],
    [
        'name' => 'Configuración 2 (127.0.0.1)',
        'host' => '127.0.0.1',
        'user' => 'fcoalder_sensea',
        'pass' => 'Sensea2025',
        'db' => 'fcoalder_SENSEA'
    ],
    [
        'name' => 'Configuración 3 (sin base de datos)',
        'host' => 'localhost',
        'user' => 'fcoalder_sensea',
        'pass' => 'Sensea2025',
        'db' => ''
    ]
];

foreach ($configs as $config) {
    echo "<h3>{$config['name']}</h3>";
    echo "<p><strong>Intentando conectar con:</strong></p>";
    echo "<ul>";
    echo "<li>Host: {$config['host']}</li>";
    echo "<li>Usuario: {$config['user']}</li>";
    echo "<li>Base de datos: {$config['db']}</li>";
    echo "</ul>";
    
    try {
        if (empty($config['db'])) {
            // Probar conexión sin especificar base de datos
            $conn = new mysqli($config['host'], $config['user'], $config['pass']);
        } else {
            $conn = new mysqli($config['host'], $config['user'], $config['pass'], $config['db']);
        }
        
        if ($conn->connect_error) {
            echo "<p style='color: red;'><strong>❌ Error de conexión:</strong> " . $conn->connect_error . "</p>";
        } else {
            echo "<p style='color: green;'><strong>✅ Conexión exitosa!</strong></p>";
            
            // Si no especificamos base de datos, mostrar las disponibles
            if (empty($config['db'])) {
                echo "<h4>Bases de datos disponibles:</h4>";
                $result = $conn->query("SHOW DATABASES");
                if ($result) {
                    echo "<ul>";
                    while ($row = $result->fetch_row()) {
                        echo "<li>" . htmlspecialchars($row[0]) . "</li>";
                    }
                    echo "</ul>";
                }
            } else {
                // Verificar que las tablas existen
                echo "<h4>Verificando tablas:</h4>";
                $tablas = ['entidadesgeograficas', 'datoslocalizacion', 'tipologiaterritorial', 'datosambientales', 'datossociales', 'datoseconomicos'];
                
                foreach ($tablas as $tabla) {
                    $result = $conn->query("SHOW TABLES LIKE '$tabla'");
                    if ($result && $result->num_rows > 0) {
                        echo "<p style='color: green;'>✅ Tabla '$tabla' existe</p>";
                    } else {
                        echo "<p style='color: red;'>❌ Tabla '$tabla' NO existe</p>";
                    }
                }
            }
            
            $conn->close();
        }
    } catch (Exception $e) {
        echo "<p style='color: red;'><strong>❌ Excepción:</strong> " . $e->getMessage() . "</p>";
    }
    
    echo "<hr>";
}

// Probar con información del servidor
echo "<h3>Información del servidor</h3>";
echo "<p><strong>PHP Version:</strong> " . phpversion() . "</p>";
echo "<p><strong>MySQL Extension:</strong> " . (extension_loaded('mysqli') ? '✅ Cargada' : '❌ No cargada') . "</p>";

// Mostrar variables de entorno relacionadas con MySQL
echo "<h3>Variables de entorno MySQL</h3>";
$env_vars = ['MYSQL_HOST', 'MYSQL_USER', 'MYSQL_PASSWORD', 'MYSQL_DATABASE'];
foreach ($env_vars as $var) {
    $value = getenv($var);
    if ($value !== false) {
        echo "<p><strong>$var:</strong> " . htmlspecialchars($value) . "</p>";
    }
}
?> 
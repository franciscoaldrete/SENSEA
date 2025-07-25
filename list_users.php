<?php
// Archivo para listar usuarios de base de datos disponibles
echo "<h2>Verificando usuarios de base de datos</h2>";

// Intentar conectar con el usuario root o un usuario existente
$host = 'localhost';
$db = 'fcoalder_SENSEA';

// Lista de usuarios comunes a probar
$usuarios_comunes = [
    ['user' => 'root', 'pass' => ''],
    ['user' => 'fcoalderete', 'pass' => ''],
    ['user' => 'fcoalder', 'pass' => ''],
    ['user' => 'admin', 'pass' => ''],
    ['user' => 'fcoalder_sensea', 'pass' => 'Sensea2025']
];

echo "<h3>Probando conexiones con diferentes usuarios:</h3>";

foreach ($usuarios_comunes as $usuario) {
    echo "<h4>Probando usuario: {$usuario['user']}</h4>";
    
    try {
        $conn = new mysqli($host, $usuario['user'], $usuario['pass']);
        
        if ($conn->connect_error) {
            echo "<p style='color: red;'>❌ Error: " . $conn->connect_error . "</p>";
        } else {
            echo "<p style='color: green;'>✅ Conexión exitosa con {$usuario['user']}!</p>";
            
            // Mostrar bases de datos disponibles
            echo "<h5>Bases de datos disponibles:</h5>";
            $result = $conn->query("SHOW DATABASES");
            if ($result) {
                echo "<ul>";
                while ($row = $result->fetch_row()) {
                    $db_name = $row[0];
                    echo "<li>" . htmlspecialchars($db_name);
                    
                    // Verificar si podemos acceder a esta base de datos
                    if ($db_name === $db) {
                        echo " <strong>(Nuestra base de datos objetivo)</strong>";
                    }
                    echo "</li>";
                }
                echo "</ul>";
            }
            
            // Mostrar usuarios disponibles (si tenemos permisos)
            echo "<h5>Usuarios disponibles:</h5>";
            $result = $conn->query("SELECT User, Host FROM mysql.user WHERE User LIKE '%fcoalder%' OR User LIKE '%sensea%'");
            if ($result) {
                echo "<ul>";
                while ($row = $result->fetch_row()) {
                    echo "<li>" . htmlspecialchars($row[0]) . "@" . htmlspecialchars($row[1]) . "</li>";
                }
                echo "</ul>";
            } else {
                echo "<p style='color: orange;'>⚠️ No tenemos permisos para ver usuarios</p>";
            }
            
            $conn->close();
            break; // Si encontramos un usuario que funciona, paramos
        }
    } catch (Exception $e) {
        echo "<p style='color: red;'>❌ Excepción: " . $e->getMessage() . "</p>";
    }
    
    echo "<hr>";
}

// Mostrar información del hosting
echo "<h3>Información del hosting:</h3>";
echo "<p><strong>Document Root:</strong> " . $_SERVER['DOCUMENT_ROOT'] . "</p>";
echo "<p><strong>Server Name:</strong> " . $_SERVER['SERVER_NAME'] . "</p>";
echo "<p><strong>Server Software:</strong> " . $_SERVER['SERVER_SOFTWARE'] . "</p>";

// Verificar archivos de configuración comunes
echo "<h3>Archivos de configuración:</h3>";
$config_files = [
    '/home4/fcoalderete/public_html/wp-config.php',
    '/home4/fcoalderete/public_html/config.php',
    '/home4/fcoalderete/public_html/database.php'
];

foreach ($config_files as $file) {
    if (file_exists($file)) {
        echo "<p style='color: green;'>✅ Existe: $file</p>";
        // Leer las primeras líneas para buscar configuraciones de BD
        $content = file_get_contents($file);
        if (preg_match('/DB_USER.*[\'"]([^\'"]+)[\'"]/', $content, $matches)) {
            echo "<p><strong>Usuario encontrado:</strong> " . htmlspecialchars($matches[1]) . "</p>";
        }
    } else {
        echo "<p style='color: red;'>❌ No existe: $file</p>";
    }
}
?> 
<?php
// Archivo de prueba para verificar la conexión a la base de datos
echo "<h2>Prueba de conexión a la base de datos</h2>";

// Configuración de conexión para la nube
$host = 'localhost';
$user = 'fcoalder_sensea';
$pass = 'Sensea2025';
$db = 'fcoalder_SENSEA';

echo "<p><strong>Intentando conectar con:</strong></p>";
echo "<ul>";
echo "<li>Host: $host</li>";
echo "<li>Usuario: $user</li>";
echo "<li>Base de datos: $db</li>";
echo "</ul>";

try {
    $conn = new mysqli($host, $user, $pass, $db);
    
    if ($conn->connect_error) {
        echo "<p style='color: red;'><strong>❌ Error de conexión:</strong> " . $conn->connect_error . "</p>";
    } else {
        echo "<p style='color: green;'><strong>✅ Conexión exitosa!</strong></p>";
        
        // Verificar que las tablas existen
        echo "<h3>Verificando tablas:</h3>";
        $tablas = ['entidadesgeograficas', 'datoslocalizacion', 'tipologiaterritorial', 'datosambientales', 'datossociales', 'datoseconomicos'];
        
        foreach ($tablas as $tabla) {
            $result = $conn->query("SHOW TABLES LIKE '$tabla'");
            if ($result->num_rows > 0) {
                echo "<p style='color: green;'>✅ Tabla '$tabla' existe</p>";
            } else {
                echo "<p style='color: red;'>❌ Tabla '$tabla' NO existe</p>";
            }
        }
        
        // Verificar permisos del usuario
        echo "<h3>Verificando permisos del usuario:</h3>";
        $result = $conn->query("SHOW GRANTS FOR '$user'@'$host'");
        if ($result) {
            while ($row = $result->fetch_row()) {
                echo "<p><code>" . htmlspecialchars($row[0]) . "</code></p>";
            }
        }
        
        $conn->close();
    }
} catch (Exception $e) {
    echo "<p style='color: red;'><strong>❌ Excepción:</strong> " . $e->getMessage() . "</p>";
}
?> 
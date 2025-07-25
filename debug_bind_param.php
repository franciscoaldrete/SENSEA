    <?php
    // Archivo de depuración para verificar bind_param
    echo "<h2>Depuración de bind_param</h2>";

    // Simular los valores que se están  pasando
    $id_entidad = 1;
    $fuente_datos = 'test';

    // Simular los valores de R1-R11
    $valores = [];
    for ($i = 1; $i <= 11; $i++) {
        $valores['R' . $i] = 'valor' . $i;
    }

    // Asegurar que todos los valores estén definidos
    $R1 = $valores['R1'] ?? '';
    $R2 = $valores['R2'] ?? '';
    $R3 = $valores['R3'] ?? '';
    $R4 = $valores['R4'] ?? '';
    $R5 = $valores['R5'] ?? '';
    $R6 = intval($valores['R6'] ?? 0);
    $R7 = intval($valores['R7'] ?? 0);
    $R8 = intval($valores['R8'] ?? 0);
    $R9 = intval($valores['R9'] ?? 0);
    $R10 = intval($valores['R10'] ?? 0);
    $R11 = intval($valores['R11'] ?? 0);

    // Cadena de tipos
$tipos = 'issssssiiiiii';

    echo "<h3>Análisis de parámetros:</h3>";
    echo "<p><strong>Cadena de tipos:</strong> '$tipos'</p>";
    echo "<p><strong>Longitud de la cadena:</strong> " . strlen($tipos) . "</p>";

    echo "<h3>Variables a pasar:</h3>";
    $variables = [$id_entidad, $fuente_datos, $R1, $R2, $R3, $R4, $R5, $R6, $R7, $R8, $R9, $R10, $R11];
    echo "<p><strong>Número de variables:</strong> " . count($variables) . "</p>";

    echo "<h3>Lista de variables:</h3>";
    echo "<ol>";
    foreach ($variables as $i => $var) {
        echo "<li>Variable " . ($i + 1) . ": " . var_export($var, true) . "</li>";
    }
    echo "</ol>";

    echo "<h3>Análisis de tipos:</h3>";
    echo "<ol>";
    for ($i = 0; $i < strlen($tipos); $i++) {
        $tipo = $tipos[$i];
        $var = $variables[$i];
        $var_type = gettype($var);
        echo "<li>Posición " . ($i + 1) . ": Tipo '$tipo', Variable: " . var_export($var, true) . " (tipo PHP: $var_type)</li>";
    }
    echo "</ol>";

    // Verificar si hay coincidencia
    if (strlen($tipos) === count($variables)) {
        echo "<p style='color: green;'><strong>✅ Coincidencia correcta:</strong> " . strlen($tipos) . " tipos = " . count($variables) . " variables</p>";
    } else {
        echo "<p style='color: red;'><strong>❌ No hay coincidencia:</strong> " . strlen($tipos) . " tipos ≠ " . count($variables) . " variables</p>";
    }

    // Probar la consulta real
    echo "<h3>Prueba de consulta:</h3>";
    $host = 'localhost';
    $user = 'fcoalder_sensea';
    $pass = 'Sensea2025';
    $db = 'fcoalder_SENSEA';

    try {
        $conn = new mysqli($host, $user, $pass, $db);
        
        if ($conn->connect_error) {
            echo "<p style='color: red;'>❌ Error de conexión: " . $conn->connect_error . "</p>";
        } else {
            echo "<p style='color: green;'>✅ Conexión exitosa</p>";
            
            $stmt = $conn->prepare("INSERT INTO datoslocalizacion (id_entidad, fuente_datos, R1, R2, R3, R4, R5, R6, R7, R8, R9, R10, R11) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            
            if ($stmt === false) {
                echo "<p style='color: red;'>❌ Error en prepare: " . $conn->error . "</p>";
            } else {
                echo "<p style='color: green;'>✅ Prepare exitoso</p>";
                
                // Intentar bind_param
                $result = $stmt->bind_param($tipos, $id_entidad, $fuente_datos, $R1, $R2, $R3, $R4, $R5, $R6, $R7, $R8, $R9, $R10, $R11);
                
                if ($result === false) {
                    echo "<p style='color: red;'>❌ Error en bind_param: " . $stmt->error . "</p>";
                } else {
                    echo "<p style='color: green;'>✅ bind_param exitoso</p>";
                    
                    // Intentar execute
                    if ($stmt->execute()) {
                        echo "<p style='color: green;'>✅ Execute exitoso - ID insertado: " . $conn->insert_id . "</p>";
                    } else {
                        echo "<p style='color: red;'>❌ Error en execute: " . $stmt->error . "</p>";
                    }
                }
                
                $stmt->close();
            }
            
            $conn->close();
        }
    } catch (Exception $e) {
        echo "<p style='color: red;'>❌ Excepción: " . $e->getMessage() . "</p>";
    }
    ?> 
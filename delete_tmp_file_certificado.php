<?php
$directory = __DIR__ . '/uploads/certificados/'; // Cambia a tu ruta
$files = glob($directory . 'certificado-safesi-*'); // Buscar archivos que empiecen con 'certificado-safesi-'
$now = time();

foreach ($files as $file) {
    if (is_file($file)) {
        // Comprobar la antigüedad del archivo
        $fileAge = $now - filemtime($file);
        
        // Si tiene más de 24 horas (24 * 60 * 60 = 86400 segundos)
        if ($fileAge > 86400) {
            unlink($file); // Eliminar el archivo
        }
    }
}
?>

<?php
/**
 * Se ejecuta durante la desactivación del plugin.
 */

// Prevenir acceso directo al archivo
if (!defined('ABSPATH')) {
    exit;
}

class TWF_Libro_Deactivator {
    /**
     * Método de desactivación.
     */
    public static function deactivate() {
        // No hacemos nada por ahora
    }
}
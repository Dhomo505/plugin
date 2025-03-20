<?php
/**
 * Plugin Name: TWF Libro de Reclamaciones
 * Plugin URI: https//:twf.pe
 * Description: Plugin para implementar el Libro de Reclamaciones según la ley peruana.
 * Version: 1.0.0
 * Author: Kadir Kevin
 * Author URI: https//:twf.pe
 * Text Domain: twf-libro
 * Domain Path: /languages
 */

// Si este archivo es llamado directamente, abortar.
if (!defined('WPINC')) {
    die;
}
// Prevenir acceso directo al archivo
if (!defined('ABSPATH')) {
    exit;
}

// Definir constantes del plugin
define('TWF_LIBRO_VERSION', '1.0.0');
define('TWF_LIBRO_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('TWF_LIBRO_PLUGIN_URL', plugin_dir_url(__FILE__));

/**
 * Código que se ejecuta durante la activación del plugin.
 */
function activate_twf_libro() {
    require_once TWF_LIBRO_PLUGIN_DIR . 'includes/class-twf-libro-activator.php';
    TWF_Libro_Activator::activate();
}

/**
 * Código que se ejecuta durante la desactivación del plugin.
 */
function deactivate_twf_libro() {
    require_once TWF_LIBRO_PLUGIN_DIR . 'includes/class-twf-libro-deactivator.php';
    TWF_Libro_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_twf_libro');
register_deactivation_hook(__FILE__, 'deactivate_twf_libro');

/**
 * El núcleo del plugin.
 */
require TWF_LIBRO_PLUGIN_DIR . 'includes/class-twf-libro.php';

/**
 * Comienza la ejecución del plugin.
 */
function run_twf_libro() {
    $plugin = new TWF_Libro();
    $plugin->run();
}
run_twf_libro();
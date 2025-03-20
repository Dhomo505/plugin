<?php
/**
 * La funcionalidad específica de administración del plugin.
 */

 // Prevenir acceso directo al archivo
if (!defined('ABSPATH')) {
    exit;
}

class TWF_Libro_Admin {

    private $plugin_name;
    private $version;

    public function __construct($plugin_name, $version) {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    /**
     * Registra los estilos del área de administración.
     */
    public function enqueue_styles() {
        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/twf-libro-admin.css', array(), $this->version, 'all');
    }

    /**
     * Registra los scripts del área de administración.
     */
    public function enqueue_scripts() {
        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/twf-libro-admin.js', array('jquery'), $this->version, false);
    }

    /**
     * Añade el menú del plugin al panel de administración.
     */
    public function add_plugin_admin_menu() {
        // Menú principal con icono de libro
        add_menu_page(
            'Libro de Reclamaciones',    // Título de la página
            'Libro de Reclamaciones',    // Texto del menú
            'manage_options',            // Capacidad requerida
            'twf-libro',                 // Slug del menú
            array($this, 'display_plugin_admin_settings'), // Función de callback
            plugin_dir_url(__FILE__) . 'assets/twfIcon.svg', // Icono personalizado
            10                           // Posición en el menú
        );

        // Submenú para ajustes (Settings)
        add_submenu_page(
            'twf-libro',                 // Slug del menú padre
            'Ajustes',                   // Título de la página
            'Ajustes',                   // Texto del menú
            'manage_options',            // Capacidad requerida
            'twf-libro',                 // Mismo slug que el padre para que sea la página por defecto
            array($this, 'display_plugin_admin_settings') // Función de callback
        );

        // Submenú para Lista de Registros
        add_submenu_page(
            'twf-libro',                 // Slug del menú padre
            'Lista de Registros',        // Título de la página
            'Lista de Registros',        // Texto del menú
            'manage_options',            // Capacidad requerida
            'twf-libro-registros',       // Slug único para este submenú
            array($this, 'display_plugin_admin_registros') // Función de callback
        );

        // Submenú para Vista Previa
        add_submenu_page(
            'twf-libro',                 // Slug del menú padre
            'Vista Previa',              // Título de la página
            'Vista Previa',              // Texto del menú
            'manage_options',            // Capacidad requerida
            'twf-libro-preview',         // Slug único para este submenú
            array($this, 'display_plugin_admin_preview') // Función de callback
        );

        // Submenú para Ayuda
        add_submenu_page(
            'twf-libro',                 // Slug del menú padre
            'Ayuda',                     // Título de la página
            'Ayuda',                     // Texto del menú
            'manage_options',            // Capacidad requerida
            'twf-libro-ayuda',           // Slug único para este submenú
            array($this, 'display_plugin_admin_ayuda') // Función de callback
        );
    }

    /**
     * Renderiza la página de ajustes.
     */
    public function display_plugin_admin_settings() {
        include_once 'partials/settings-display.php';
    }

    /**
     * Renderiza la página de lista de registros.
     */
    public function display_plugin_admin_registros() {
        include_once 'partials/registros-display.php';
    }

    /**
     * Renderiza la página de vista previa.
     */
    public function display_plugin_admin_preview() {
        include_once 'partials/preview-display.php';
    }

    /**
     * Renderiza la página de ayuda.
     */
    public function display_plugin_admin_ayuda() {
        include_once 'partials/ayuda-display.php';
    }
}
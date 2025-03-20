<?php
/**
 * La clase principal del plugin que define la funcionalidad central.
 */

 // Prevenir acceso directo al archivo
if (!defined('ABSPATH')) {
    exit;
}

class TWF_Libro {

    protected $loader;
    protected $plugin_name;
    protected $version;

    public function __construct() {
        $this->plugin_name = 'twf-libro';
        $this->version = TWF_LIBRO_VERSION;
        $this->load_dependencies();
        $this->define_admin_hooks();
        $this->define_public_hooks();
    }

    private function load_dependencies() {
        // Incluir la clase que orquesta los hooks
        require_once TWF_LIBRO_PLUGIN_DIR . 'includes/class-twf-libro-loader.php';
        
        // Incluir la clase de administración
        require_once TWF_LIBRO_PLUGIN_DIR . 'admin/class-twf-libro-admin.php';
        
        // Incluir la clase pública
        require_once TWF_LIBRO_PLUGIN_DIR . 'public/class-twf-libro-public.php';
        
        // Incluir la clase de base de datos
        require_once TWF_LIBRO_PLUGIN_DIR . 'includes/class-twf-libro-database.php';
        
        $this->loader = new TWF_Libro_Loader();
    }

    private function define_admin_hooks() {
        $plugin_admin = new TWF_Libro_Admin($this->get_plugin_name(), $this->get_version());
        
        // Estilos y scripts
        $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_styles');
        $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts');
        
        // Menú de administración
        $this->loader->add_action('admin_menu', $plugin_admin, 'add_plugin_admin_menu');
    }

    private function define_public_hooks() {
        $plugin_public = new TWF_Libro_Public($this->get_plugin_name(), $this->get_version());
        
        // Estilos y scripts
        $this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_styles');
        $this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_scripts');
        
        // Shortcode para el formulario
        $this->loader->add_action('init', $plugin_public, 'register_shortcodes');
    }

    public function run() {
        $this->loader->run();
    }

    public function get_plugin_name() {
        return $this->plugin_name;
    }

    public function get_version() {
        return $this->version;
    }
}
<?php
/**
 * La funcionalidad del lado público del plugin.
 */

// Prevenir acceso directo al archivo
if (!defined('ABSPATH')) {
    exit;
}
class TWF_Libro_Public {
    private $plugin_name;
    private $version;

    public function __construct($plugin_name, $version) {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    public function enqueue_styles() {
        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/twf-libro-public.css', array(), $this->version, 'all');
    }

    public function enqueue_scripts() {
        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/twf-libro-public.js', array('jquery'), $this->version, false);
    }

    public function register_shortcodes() {
        add_shortcode('twf_libro_form', array($this, 'display_form'));
    }

    public function display_form() {
        ob_start();
        include_once 'partials/formulario-display.php';
        return ob_get_clean();
    }
}
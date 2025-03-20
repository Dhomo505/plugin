<?php
// Prevenir acceso directo al archivo
if (!defined('ABSPATH')) {
    exit;
}

// Poner en cola el archivo CSS de la página ayuda-display
function enqueue_ayuda_display_styles() {
  $screen = get_current_screen();
  if ($screen->id === 'toplevel_page_twf-libro-ayuda') {
    wp_enqueue_style('ayuda-display-css', plugin_dir_url(__FILE__) . 'admin/css/ayuda-display.css');
  }
}
add_action('admin_enqueue_scripts', 'enqueue_ayuda_display_styles');

// Determinar la pestaña activa
$tab = isset($_GET['tab']) ? sanitize_text_field($_GET['tab']) : 'ajustes';

// Crear la URL base para los enlaces de pestañas
$tab_url = add_query_arg(array(
    'page' => 'twf-libro-ayuda',
), admin_url('admin.php'));

?>
<div class="wrap">
    <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
    
    <h2 class="nav-tab-wrapper">
        <a href="<?php echo esc_url(add_query_arg('tab', 'ajustes', $tab_url)); ?>" class="nav-tab <?php echo $tab === 'ajustes' ? 'nav-tab-active' : ''; ?>">
            <span class="dashicons dashicons-admin-settings" style="margin-right: 5px;"></span> Ajustes
        </a>
        <a href="<?php echo esc_url(add_query_arg('tab', 'registros', $tab_url)); ?>" class="nav-tab <?php echo $tab === 'registros' ? 'nav-tab-active' : ''; ?>">
            <span class="dashicons dashicons-list-view" style="margin-right: 5px;"></span> Lista de Registros
        </a>
        <a href="<?php echo esc_url(add_query_arg('tab', 'preview', $tab_url)); ?>" class="nav-tab <?php echo $tab === 'preview' ? 'nav-tab-active' : ''; ?>">
            <span class="dashicons dashicons-visibility" style="margin-right: 5px;"></span> Vista Previa
        </a>
        <a href="<?php echo esc_url(add_query_arg('tab', 'contacto', $tab_url)); ?>" class="nav-tab <?php echo $tab === 'contacto' ? 'nav-tab-active' : ''; ?>">
            <span class="dashicons dashicons-email" style="margin-right: 5px;"></span> Contáctanos
        </a>
    </h2>
    
    <div class="tab-content">
        <?php if ($tab === 'ajustes'): ?>
            <div id="tab-ajustes">
                <h3>Ayuda sobre Ajustes</h3>
                <p>Aquí encontrarás información sobre cómo configurar el Libro de Reclamaciones.</p>
                <!-- Añade aquí más contenido sobre la sección de ajustes -->
            </div>
        <?php elseif ($tab === 'registros'): ?>
            <div id="tab-registros">
                <h3>Ayuda sobre Lista de Registros</h3>
                <p>Aquí encontrarás información sobre cómo gestionar los registros del Libro de Reclamaciones.</p>
                <!-- Añade aquí más contenido sobre la sección de registros -->
            </div>
        <?php elseif ($tab === 'preview'): ?>
            <div id="tab-preview">
                <h3>Ayuda sobre Vista Previa</h3>
                <p>Aquí encontrarás información sobre cómo previsualizar el formulario del Libro de Reclamaciones.</p>
                <!-- Añade aquí más contenido sobre la sección de vista previa -->
            </div>
        <?php elseif ($tab === 'contacto'): ?>
            <div id="tab-contacto">
                <h3>Contáctanos</h3>
                <p>Si necesitas ayuda adicional, puedes contactarnos:</p>
                <!-- Añade aquí la información de contacto -->
            </div>
        <?php endif; ?>
    </div>
</div>

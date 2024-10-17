<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link https://Jhonaiquel.com
 * @since 1.0.0
 *
 * @package Custom_Woocommerce_Features
 * @subpackage Custom_Woocommerce_Features/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<?php
defined('ABSPATH') or die("how did you get here?");
if (!current_user_can('administrator')) {
    wp_die(__('you dont have permisssion to be here.'));
}
?>
<div class="container card">
    <p class="h2">Custom Woocommerce Features</p>
    <hr class="my-2">
    <p class="h4">Personaliza el texto a mostrar en la página de checkout</p>

    <div class="container">
        <div class="col-md-6">
        <form action="options.php" method="post">
            <?php
                settings_fields('custom-woocommerce-features-settings');
                do_settings_sections('custom-woocommerce-features-settings');
            ?>
            <label for="text" class="form-label">texto a mostrar</label>
            <input type="text" name="text" class="form-control" id="text" aria-describedby="texpHelp" value="<?php echo get_option('text');?>">
            <div id="textHelp" class="form-text">personaliza el texto como quieras y utiliza las banderas {porcentaje} y {monto} para insertar los valores definidos</div>
            <div class="form-text">ejemplo: "obtén un descuento del {porcentaje} si gastas mas de {monto} hoy!"</div>
            <hr class="my-3">
            <p class="h6 form-text">nivel de descuento 1</p>
            <label for="porcentage1" class="form-label">porcentaje nivel 1</label>
            <input type="number" name="porcentaje1" class="form-control" id="porcentaje1" aria-describedby="porcentaje1Help" value="<?php echo get_option('porcentaje1');?>">
            <div id="porcentaje1Help" class="form-text">  el porcentaje de descuento a aplicar cuando se selecciona el monto especificado</div>
            <label for="monto1" class="form-label">monto del nivel 1</label>
            <input type="number" name="monto1" class="form-control" id="monto1" aria-describedby="monto1Help" value="<?php echo get_option('monto1');?>">
            <div id="monto1Help" class="form-text"> el monto a partir del cual se aplicará el porcentaje especificado</div>
            <hr class="my-3">
            <p class="h6 form-text">nivel de descuento 2</p>
            <label for="porcentaje2" class="form-label">porcentaje nivel 2</label>
            <input type="number" name="porcentaje2" class="form-control" id="porcentaje2" aria-describedby="porcentaje2Help" value="<?php echo get_option(option: 'porcentaje2');?>">
            <div id="porcentaje2Help" class="form-text">  el porcentaje de descuento a aplicar cuando se selecciona el monto especificado</div>
            <label for="monto2" class="form-label">monto del nivel 2</label>
            <input type="number" name="monto2" class="form-control" id="monto2" aria-describedby="monto2Help" value="<?php echo get_option(option: 'monto2');?>">
            <div id="monto2Help" class="form-text"> el monto a partir del cual se aplicará el porcentaje especificado</div>
            <button type="submit" class="btn btn-primary mt-3">Guardar</button>
            <!-- podría colocar más niveles, incluso hacerlo dinámico con un botón de + y poder añadir cuantos niveles sean necesarios, pero por tema de tiempo lo dejaré así -->
        </form>
        </div>
    </div>
</div>
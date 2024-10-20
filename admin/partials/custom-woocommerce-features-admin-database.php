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
if (!current_user_can('edit_posts')) {
    wp_die(__('you dont have permisssion to be here.'));
}
function get_orders()
{
    global $wpdb;
    $orders = $wpdb->get_results("
SELECT orders.id AS id, users.display_name AS nombre, DATE_FORMAT(orders.date_created_gmt,'%d/%m/%Y') AS fecha, TRUNCATE(orders.total_amount, 2) AS total
FROM `wp_wc_orders` AS orders
JOIN `wp_users` AS users
WHERE MONTH(orders.date_created_gmt) = MONTH(CURRENT_TIMESTAMP)
ORDER BY fecha DESC ");
    return $orders;
}

?>
<div class="container card">
    <p class="h2">Custom Woocommerce Features</p>
    <hr class="my-2">
    <p class="h4">Lista de pedidos completados</p>
    <script>
        $(document).ready(function() {
            $('#custom-woocommerce-features-table').DataTable();
        });
    </script>
    <table id="custom-woocommerce-features-table" class="display stripe">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Fecha</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $orders = get_orders();
            foreach ($orders as $order) {
                echo "<tr>";
                echo "<td>" . $order->id . "</td>";
                echo "<td>" . $order->nombre . "</td>";
                echo "<td>" . $order->fecha . "</td>";
                echo "<td>" . $order->total . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Fecha</th>
                <th>Total</th>
            </tr>
        </tfoot>
    </table>
</div>
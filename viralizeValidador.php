<?php
/**
 * Plugin Name:       Viralize Validator Forms 
 * Plugin URI:        https://felipevidalmendes.com/
 * Description:       Cria validações especificas nos campos dos formulários das LPs da Viralize 
 * Version:           1.0.27
 * Author:            Felipe Vidal Mendes
 * Author URI:        https://felipevidalmendes.com/
 * License:           GPL
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       my-basics-plugin
 * Domain Path:       /languages
 */


// Validate the Ticket ID field is in XX-XXXXX-XXXX format.
add_action( 'elementor_pro/forms/validation', function ( $record, $ajax_handler ) {
    $fields = $record->get_field( [
        'id' => 'zap',
    ] );

    if ( empty( $fields ) ) {
        return;
    }

    $field = current( $fields );
    

    if ( preg_match( '/[0-9\(\\)\]{2} [0-9]{5}-[0-9]{4}/', $field['value'] ) !== 1 ) {
        $ajax_handler->add_error( $field['id'], 'Por favor insira um número no formato  XX-XXXXX-XXXX, Exp: (12)34567-8900 ');
    }

    // if ( preg_match( '/[0-9]{2}-[0-9]{5}-[0-9]{4}/', $field['value'] ) !== 1 ) {
    //     $ajax_handler->add_error( $field['id'], 'Insira um número no formato  XX-XXXXX-XXXX Exp: (12)34567-8900' );
    // }
}, 10, 2 );








 ?>
<?php


add_action( "update_option_{$wpdb->prefix}user_roles", 'my_um_role_update_name', 10, 3 );

    function my_um_role_update_name( $old_value, $new_value, $option ) {

        global $wpdb;
        
        if( $option == $wpdb->prefix . 'user_roles' ) {
            $trace_log = ini_get( 'error_log' );
            if( empty( $trace_log ) || ini_get( 'log_errors' ) == 'Off' ) {
                $trace_log = WP_CONTENT_DIR . '/umroles.html';
                $html_div = '<div>';
                $html_end = '</div>';
            } else {
                $html_div = '';
                $html_end = chr(13);
            }
            $pretext = $html_div . '[' . wp_date( get_option( 'date_format' ) . ' ' . get_option( 'time_format' ), time()) . '] PHP Notice: Trace rename of UM role: ';
            foreach( $old_value as $key => $value ) {                
                if( substr( $key, 0, 3 ) == 'um_' ) {                                     
                    $output = $pretext . "'" . $key . "' Name WP old: '" . $old_value[$key]['name'] . "' Name WP new: '" . $new_value[$key]['name'] . "' ";                    
                    if( $old_value[$key]['name'] != $new_value[$key]['name'] ) {
                        $slug = substr( $key, 3 );                        
                        $umrole = get_option( "um_role_{$slug}_meta" );
                        $output .= "Name UM meta: '" . $umrole['name'] . "' ";
                        if( $umrole['name'] == $old_value[$key]['name'] || empty( $umrole['name'] )) {
                            $umrole['name'] =  $new_value[$key]['name'];
                            $return = update_option( "um_role_{$slug}_meta", $umrole, true );
                            if( $return ) $output .= 'UPDATED'; else $output .= 'UPDATE ERROR';
                        } else $output .= 'old WP name not equal to current UM name, NOT UPDATED';
                    } else $output .= 'NO ACTION';

                    file_put_contents( $trace_log, $output . $html_end, FILE_APPEND );
                }
            }
        }        
    }

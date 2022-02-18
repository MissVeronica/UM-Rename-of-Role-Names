<?php


add_action( "update_option_{$wpdb->prefix}user_roles", 'my_um_role_update_name', 10, 3 );

    function my_um_role_update_name( $old_value, $new_value, $option ) {

        global $wpdb;
        
        if( $option == $wpdb->prefix . 'user_roles' ) {
            foreach( $old_value as $key => $value ) {                
                if( substr( $key, 0, 3 ) == 'um_' ) {                    
                    $output = '<div>' . $key . ' old: ' . $old_value[$key]['name'] . ' new: ' . $new_value[$key]['name'];
                    $slug = substr( $key, 3 ); 
                    $umrole = get_option( "um_role_{$slug}_meta" );
                    $output .= ' meta: ' . $umrole['name'] . '</div>';
                    file_put_contents( WP_CONTENT_DIR . '/umroles.html', $output, FILE_APPEND );
                    if( $old_value[$key]['name'] != $new_value[$key]['name'] ) {
                        $slug = substr( $key, 3 );                        
                        $umrole = get_option( "um_role_{$slug}_meta" );
                        if( $umrole['name'] == $old_value[$key]['name'] || empty( $umrole['name'] )) {
                            $umrole['name'] =  $new_value[$key]['name'];
                            update_option( "um_role_{$slug}_meta", $umrole, true );
                        }
                    }
                }
            }
        }        
    }

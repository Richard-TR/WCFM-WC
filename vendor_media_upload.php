<?php
/** ^ do not copy. just for syntax highlighting. Copy from line 7 to 28

The following two filters limit WCFM vendors to png and jpg of 5mb or lower
--------------------------------------------------------------------------

/** Limit vendors to png and jpegs **/
add_filter('upload_mimes','restict_mimes_all_but_admin'); 
function restict_mimes_all_but_admin($mimes) { 
if(!current_user_can('administrator')){
    $mimes = array( 
                'jpg|jpeg|jpe' => 'image/jpeg', 
                'png' => 'image/png', 
    ); 
}
    return $mimes;
}

/** Set the upload size limit for all but admin **/
function upload_size_limit( $size ) {
    if ( ! current_user_can( 'administrator' ) ) {
        // Current: 5 MB.
    $size = 1024 * 5000;
    }
    return $size;
}
add_filter( 'upload_size_limit', 'upload_size_limit', 20 );

--------------------------------------------------------------------------

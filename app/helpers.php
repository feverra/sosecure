<?php
    function encrypt_decrypt($action, $string) {
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $secret_key = 'EnCRypT10nK#Y!RiSRNnSosecure.co.th-Owasp)(*&^%$#@!123!';
        $secret_iv = 'EnCRypT10nK#Y!RiSRNnSosecure.co.th-Owasp)(*&^%$#@!123!';
        // hash
        $key = hash('sha256', $secret_key);

        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        if ( $action == 'encrypt' ) {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        } else if( $action == 'decrypt' ) {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }
        return $output;
    }

    if ( !function_exists('mysql_escape'))
    {
        function mysql_escape($inp)
        { 
            if(is_array($inp)) return array_map(__METHOD__, $inp);
            if(!empty($inp) && is_string($inp)) { 
                return str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $inp); 
            } 
            return $inp; 
        }
    }

?>


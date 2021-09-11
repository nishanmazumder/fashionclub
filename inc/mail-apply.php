<?php

/**
 *  Mail - Apply
 * 
 * @package NM_THEME
 */


add_action('init', 'usc_apply_form_submmission');

function usc_apply_form_submmission()
{
    if (isset($_POST['nm_usc_submit']) && isset($_POST['usc_nonce_field'])) { //&& wp_verify_nonce($_POST['usc_nonce_field'], 'usc_nonce_action')) {
        if (wp_verify_nonce($_POST['usc_nonce_field'], 'usc_nonce_action')) {

            // Mail Details
            $to = 'arosh019@gmail.com';
            $subject = 'New Application';

            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: <frombdsoftcreation@gmail.com>' . "\r\n";
            //$headers .= 'Cc: designland019@gmail.com' . "\r\n";

            //Message format
            $message = '<html><body>';
            $message .= '<h2>Basic Info</h2>';
            $message .= '<strong>Name :</strong><span>' . sanitize_text_field($_POST['usc_name']) . '</span><br>';
            $message .= '<strong>Email :</strong><span>' . sanitize_text_field($_POST['usc_email']) . '</span><br>';
            $message .= '<strong>Password :</strong><span>' . sanitize_text_field($_POST['usc_phone']) . '</span><br>';
            $message .= '<strong>Password :</strong><span>' . sanitize_text_field($_POST['usc_country']) . '</span><br>';
            $message .= '<strong>Password :</strong><span>' . sanitize_text_field($_POST['usc_zip']) . '</span><br>';
            $message .= '<strong>Password :</strong><span>' . sanitize_text_field($_POST['usc_subscription']) . '</span><br>';
            $message .= '</body></html>';

            //Send
            $sent = mail($to, $subject, $message, $headers);

            if ($sent) {
                wp_safe_redirect(NM_SITE_URL . '/message');
                exit;
            } else {
                echo "not send";
            }
        }
    }
}

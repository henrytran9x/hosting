<?php
function hosting_form_system_theme_settings_alter(&$form, &$form_state) {

     $contact_icon = theme_get_setting('contact_icon');
     if (file_uri_scheme($contact_icon) == 'public') {
        $contact_icon = file_uri_target($contact_icon);
    }
    drupal_add_css(drupal_get_path('theme','hosting').'/css/theme-settings.css');

    // Contact
    $form['contact'] = array(
        '#type' => 'fieldset',
        '#title' => 'Contact Setting',
        '#group' => 'drupaloss_settings',
        '#weight' => 100,
    );
    // Contact MAP
    /*
    $form['contact']['contactmap'] = array(
        '#type' => 'fieldset',
        '#title' => '<div class="plus"></div><h3 class="options_heading">Contact Map</h3>',
    );
    */

     // Contact MAP Address
    $contact_address = theme_get_setting('contact_address');
    $form['contact']['contact_address'] = array(
        '#type'  => 'text_format',
        '#title' => t('Company Address'),
        '#default_value' => isset($contact_address['value']) ? $contact_address['value'] : '',
        '#format' => isset($contact_address['format']) ? $contact_address['format'] : 'filtered_html',
    );
    // Contact MAP Phone
    $form['contact']['contact_phone'] = array(
        '#type' => 'textfield',
        '#title' => t('Company Telephone'),
        '#default_value' => theme_get_setting('contact_phone'),
    );
    // Company Name
    $form['contact']['contact_mail'] = array(
        '#type' => 'textfield',
        '#title' => t('Company Email'),
        '#default_value' => theme_get_setting('contact_mail'),
    );
    // Website
    $form['contact']['contact_website'] = array(
        '#type' => 'textfield',
        '#title' => 'Website',
        '#default_value' => theme_get_setting('contact_website'),
    );

    // Contact MAP Lat
    $form['contact']['contactmap_lat'] = array(
        '#type' => 'textfield',
        '#title' => 'Lat',
        '#description' => t('Lat google map'),
        '#default_value' => theme_get_setting('contactmap_lat'),
    );

    // Contact MAP Long
    $form['contact']['contactmap_long'] = array(
        '#type' => 'textfield',
        '#title' => 'Long',
        '#description' => t('Long google map'),
        '#default_value' => theme_get_setting('contactmap_long'),
    );

    $form['contact']['contact_icon'] = array(
        '#type' => 'textfield',
        '#title' => 'Path to Contact Icon',
        '#default_value' => $contact_icon,
        '#disabled' => TRUE,
    );

    $form['contact']['contact_icon_upload'] = array(
        '#type' => 'file',
        '#title' => 'Upload maker icon',
        '#description' => 'Google map maker icon.',
    );
    $form['contact']['style_map_google'] = array(
        '#type' => 'textarea',
        '#title' => 'Style map google',
        '#description' => 'Copy code map google "Javascript style array" in web '.l('Style google','http://snazzymaps.com/',array('attributes'=>array('target'=>'_blank'))),
        '#rows'  => 20,
        '#default_value' => theme_get_setting('style_map_google'),
    );
     $text_map = theme_get_setting('text_map_tip');
     $form['contact']['text_map_tip'] = array(
        '#type'  => 'text_format',
        '#title' => t('Text Map'),
        '#default_value' => isset($text_map['value']) ? $text_map['value'] : '',
        '#description' => t('This text show tip on map'),
        '#format' => isset($text_map['format']) ? $text_map['format'] : 'filtered_html',
    );
    // Submit Button
    $form['#submit'][] = 'hosting_themes_settings_submit';
}

function hosting_themes_settings_submit($form, &$form_state) {
    // Get the previous value
    $previous = 'public://' . $form['contact']['contact_icon']['#default_value'];

    $file = file_save_upload('contact_icon_upload');
    if ($file) {
        $parts = pathinfo($file->filename);
        $destination = 'public://' . $parts['basename'];
        $file->status = FILE_STATUS_PERMANENT;

        if (file_copy($file, $destination, FILE_EXISTS_REPLACE)) {
            $_POST['contact_icon'] = $form_state['values']['contact_icon'] = $destination;
            if ($destination != $previous) {
                return;
            }
        }
    } else {
        // Avoid error when the form is submitted without specifying a new image
        $_POST['contact_icon'] = $form_state['values']['contact_icon'] = $previous;
    }

}

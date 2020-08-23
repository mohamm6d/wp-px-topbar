<?php
function px_topbar_add_admin_menu()
{
    add_options_page('PX Topbar', 'PX Topbar', 'manage_options', 'px-topbar', 'px_topbar_options_page');
}

function px_topbar_settings_init()
{
    register_setting('pxTopBar', 'px_topbar_settings');
    add_settings_section(
        'px_topbar_pxTopBar_section',
        __('Main Configuration', 'wordpress'),
        'px_topbar_settings_section_callback',
        'pxTopBar'
    );

    add_settings_field(
        'text_message',
        __('Message', 'wordpress'),
        'render_text_input',
        'pxTopBar',
        'px_topbar_pxTopBar_section', 'text_message'
    );
    add_settings_field(
        'minimum_card',
        __('minimum Card', 'wordpress'),
        'render_text_input',
        'pxTopBar',
        'px_topbar_pxTopBar_section', 'minimum_card'
    );

    /*add_settings_field(
'px_topbar_select_field_1',
__( 'Our Field 1 Title', 'wordpress' ),
'px_topbar_select_field_1_render',
'pxTopBar',
'px_topbar_pxTopBar_section'
);*/
}

function render_text_input($option)
{
    $options = get_option('px_topbar_settings');
    echo "<input type='text' name='px_topbar_settings[" . $option . "]' value='" . $options[$option] . "'>";

}

function px_topbar_select_field_1_render()
{
    $options = get_option('px_topbar_settings');
    ?>
        <select name='px_topbar_settings[px_topbar_select_field_1]'>
            <option value='1' <?php selected($options['px_topbar_select_field_1'], 1);?>>Option 1</option>
            <option value='2' <?php selected($options['px_topbar_select_field_1'], 2);?>>Option 2</option>
        </select>

    <?php
}

function px_topbar_settings_section_callback()
{
    echo __('Settings for PX Topbar plugin', 'wordpress');
}

function px_topbar_options_page()
{
    include dirname(__FILE__) . '/views/admin.php';
}
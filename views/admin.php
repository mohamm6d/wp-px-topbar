<form action='options.php' method='post'>
    <?php
settings_fields('pxTopBar');
do_settings_sections('pxTopBar');
submit_button();
?></form>
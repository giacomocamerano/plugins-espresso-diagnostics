<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://espressoplugins.com
 * @since      1.0.0
 *
 * @package    Espresso__Wordpress_Diagnostics
 * @subpackage Espresso__Wordpress_Diagnostics/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<!-- Create a header in the default WordPress 'wrap' container -->
=== <?php _e('Date of export', 'espresso-wordpress-diagnostics'); ?>: <?php echo date("Y-m-d H:i:s")?> === <br><br>
=== <?php _e('Wordpress Details', 'espresso-wordpress-diagnostics'); ?> ===<br><br> 
    <?php if (isset($info['wp']) && !empty($info['wp']) && is_array($info['wp'])) {
        foreach ($info['wp'] as $field=>$value) { ?>
            <?php echo $wpDescriptors[$field]['title']; ?>: <?php echo $value; ?><br><?php
        }
    } ?><br><br>
=== <?php _e('Themes', 'espresso-wordpress-diagnostics'); ?> ===<br><br>
<?php if (isset($info['themes']) && !empty($info['themes']) && is_array($info['themes'])) {
    foreach ($info['themes'] as $theme=>$details) { ?>
            <?php echo $details['name']; ?>: <?php __("Version", 'espresso-wordpress-diagnostics'); ?>: <?php echo $details['version']; ?> (<?php echo $details['status']; ?>)<br><?php
    }
} else { ?>
    <?php echo __("There are no themes on this Wordpress installation",'espresso-wordpress-diagnostics'); ?><?php
} ?><br><br>
=== <?php _e('Active Wordpress Plugins', 'espresso-wordpress-diagnostics'); ?> ===<br><br>
<?php if (isset($info['plugins']['active']) && !empty($info['plugins']['active']) && is_array($info['plugins']['active'])) { 
    foreach ($info['plugins']['active'] as $plugin=>$details) { ?>
        <?php echo $details['Name']; ?>: <?php echo $details['Version']; ?><br><?php
    }
} else { ?>
    <?php echo __("There are no active plugins on this Wordpress installation",'espresso-wordpress-diagnostics'); ?><?php
} ?><br><br>
=== <?php _e('Inactive Wordpress Plugins', 'espresso-wordpress-diagnostics'); ?> ===<br><br>
<?php if (isset($info['plugins']['inactive']) && !empty($info['plugins']['inactive']) && is_array($info['plugins']['inactive'])) {
    foreach ($info['plugins']['inactive'] as $plugin=>$details) { ?>
        <?php echo $details['Name']; ?>: <?php echo $details['Version']; ?><br><?php
    }
} else { ?>
    <?php echo __("There are no inactive plugins on this Wordpress installation",'espresso-wordpress-diagnostics'); ?><?php
} ?><br><br><?php

$topics=['server', 'php', 'db'];

foreach ($topics as $topic) { ?>

   === <?php echo sprintf(__('%s Details', 'espresso-wordpress-diagnostics'), ucwords($topic)); ?> ===<br><br>
        <?php if (isset($info[$topic]) && !empty($info[$topic]) && is_array($info[$topic])) {
            foreach ($info[$topic] as $field=>$value) { 
                echo $field. ": ". $value."<br>"; 
            }
        } else {
        echo sprintf(__("There is no info regarding '%s'",'espresso-wordpress-diagnostics'), $topic);
    }
    echo "<br><br>";
}
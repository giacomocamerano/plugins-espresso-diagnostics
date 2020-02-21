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
<div class="wrap">

    <h2><?php echo __( 'Espresso Wordpress Diagnostics', 'espresso-wordpress-details' ); ?></h2>
    <a class="button-primary" target="_blank" href="<?php echo wp_nonce_url( admin_url( 'admin-ajax.php?action=espresso_generate_diagnostic_package_json' ), 'espresso_generate_diagnostic_package_json' ); ?>"><?php echo __("Download all diagnostics (JSON)", 'espresso-wordpress-diagnostics' ); ?></a>
    <a class="button-primary" target="_blank" href="<?php echo wp_nonce_url( admin_url( 'admin-ajax.php?action=espresso_generate_diagnostic_package_csv' ), 'espresso_generate_diagnostic_package_csv' ); ?>"><?php echo __("Download all diagnostics (CSV)", 'espresso-wordpress-diagnostics' ); ?></a>
    <a class="button-primary" target="_blank" href="<?php echo wp_nonce_url( admin_url( 'admin-ajax.php?action=espresso_generate_diagnostic_package_copy' ), 'espresso_generate_diagnostic_package_copy' ); ?>"><?php echo __("Generate text version to copy and paste", 'espresso-wordpress-diagnostics' ); ?></a>
    <h3><?php _e('Wordpress Details', 'espresso-wordpress-diagnostics'); ?> <a href="#" data-tooltip="<?php _e('All info on the Wordpress Installation', 'espresso-wordpress-diagnostics' ); ?>">[?]</a></h3>
    <?php if (isset($info['wp']) && !empty($info['wp']) && is_array($info['wp'])) { ?>
        <table class="espresso_table widefat" cellspacing="0" id="status">
            <thead>
                <tr>
                    <th colspan="2" data-export-label="<?php echo __("Field", 'espresso-wordpress-diagnostics'); ?>"><?php echo __("Field", 'espresso-wordpress-diagnostics'); ?></th>
                    <th data-export-label="<?php echo __("Value", 'espresso-wordpress-diagnostics'); ?>"><?php echo __("Value", 'espresso-wordpress-diagnostics'); ?></th>
                </tr>
            </thead>
            
            <tbody><?php
                foreach ($info['wp'] as $field=>$value) { ?>
                    <tr>
                        <td data-export-label="<?php echo $wpDescriptors[$field]['title']; ?>"><?php echo $wpDescriptors[$field]['title']; ?></td>
                        <td class="help"><a href="#" data-tooltip="<?php echo $wpDescriptors[$field]['description']; ?>">[?]</a></td>
                        <td><?php echo $value; ?></td>
                    </tr><?php
                } ?>
                
            </tbody>
        </table><?php
    } ?>
    <h3><?php _e('Themes', 'espresso-wordpress-diagnostics'); ?> <a href="#" data-tooltip="<?php _e('All info on the Wordpress Themes that are installed', 'espresso-wordpress-diagnostics' ); ?>">[?]</a></h3>
    <?php if (isset($info['themes']) && !empty($info['themes']) && is_array($info['themes'])) { ?>
        <table class="espresso_table widefat" cellspacing="0" id="status">
            <thead>
                <tr>
                    <th colspan="2" data-export-label="<?php echo __("Theme Name", 'espresso-wordpress-diagnostics'); ?>"><?php echo __("Theme Name", 'espresso-wordpress-diagnostics'); ?></th>
                    <th data-export-label="<?php echo __("Theme Version", 'espresso-wordpress-diagnostics'); ?>"><?php echo __("Theme Version", 'espresso-wordpress-diagnostics'); ?></th>
                    <th data-export-label="<?php echo __("Status", 'espresso-wordpress-diagnostics'); ?>"><?php echo __("Status", 'espresso-wordpress-diagnostics'); ?></th>
                </tr>
            </thead>
            
            <tbody><?php
                foreach ($info['themes'] as $theme=>$details) { ?>
                    <tr>
                        <td data-export-label="<?php echo $details['name'] ?>"><?php echo $details['name']; ?></td>
                        <td class="help"><a href="#" data-tooltip="<?php echo $details['description']; ?>">[?]</a></td>
                        <td data-export-label="<?php echo $details['version'] ?>"><?php echo $details['version']; ?></td>
                        <td data-export-label="<?php echo $details['status'] ?>"><?php echo $details['status']; ?></td>
                    </tr><?php
                } ?>
                
            </tbody>
        </table><?php
    } else { ?>
        <p><?php echo __("There are no themes on this Wordpress installation",'espresso-wordpress-diagnostics'); ?></p><?php
    }?>
    <h3><?php _e('Active Wordpress Plugins', 'espresso-wordpress-diagnostics'); ?> <a href="#" data-tooltip="<?php _e('All info on the Wordpress plugins that are installed and active', 'espresso-wordpress-diagnostics' ); ?>">[?]</a></h3>
    <?php if (isset($info['plugins']['active']) && !empty($info['plugins']['active']) && is_array($info['plugins']['active'])) { ?>
        <table class="espresso_table widefat" cellspacing="0" id="status">
            <thead>
                <tr>
                    <th colspan="2" data-export-label="<?php echo __("Plugin Name", 'espresso-wordpress-diagnostics'); ?>"><?php echo __("Plugin Name", 'espresso-wordpress-diagnostics'); ?></th>
                    <th data-export-label="<?php echo __("Plugin Version", 'espresso-wordpress-diagnostics'); ?>"><?php echo __("Plugin Version", 'espresso-wordpress-diagnostics'); ?></th>
                </tr>
            </thead>
            
            <tbody><?php
                foreach ($info['plugins']['active'] as $plugin=>$details) { ?>
                    <tr>
                        <td data-export-label="<?php echo $details['Name'] ?>"><?php echo $details['Name']; ?></td>
                        <td class="help"><a href="#" data-tooltip="<?php echo $details['Description']; ?>">[?]</a></td>
                        <td><?php echo $details['Version']; ?></td>
                    </tr><?php
                } ?>
                
            </tbody>
        </table><?php
    } else { ?>
        <p><?php echo __("There are no active plugins on this Wordpress installation",'espresso-wordpress-diagnostics'); ?></p><?php
    }?>
    <h3><?php _e('Inactive Wordpress Plugins', 'espresso-wordpress-diagnostics'); ?> <a href="#" data-tooltip="<?php _e('All info on the Wordpress plugins that are installed but not inactive', 'espresso-wordpress-diagnostics' ); ?>">[?]</a></h3>
    <?php if (isset($info['plugins']['inactive']) && !empty($info['plugins']['inactive']) && is_array($info['plugins']['inactive'])) { ?>
        <table class="espresso_table widefat" cellspacing="0" id="status">
            <thead>
                <tr>
                    <th colspan="2" data-export-label="<?php echo __("Plugin Name", 'espresso-wordpress-diagnostics'); ?>"><?php echo __("Plugin Name", 'espresso-wordpress-diagnostics'); ?></th>
                    <th data-export-label="<?php echo __("Plugin Version", 'espresso-wordpress-diagnostics'); ?>"><?php echo __("Plugin Version", 'espresso-wordpress-diagnostics'); ?></th>
                </tr>
            </thead>
            
            <tbody><?php
                foreach ($info['plugins']['inactive'] as $plugin=>$details) { ?>
                    <tr>
                        <td data-export-label="<?php echo $details['Name'] ?>"><?php echo $details['Name']; ?></td>
                        <td class="help"><a href="#" data-tooltip="<?php echo $details['Description']; ?>">[?]</a></td>
                        <td><?php echo $details['Version']; ?></td>
                    </tr><?php
                } ?>
                
            </tbody>
        </table><?php
    } else { ?>
        <p><?php echo __("There are no inactive plugins on this Wordpress installation",'espresso-wordpress-diagnostics'); ?></p><?php
    }?>
    <?php

    $topics=['server', 'php', 'db'];

    foreach ($topics as $topic) { ?>

        <h3><?php echo sprintf(__('%s Details', 'espresso-wordpress-diagnostics'), ucwords($topic)); ?> <a href="#" data-tooltip="<?php echo sprintf(__('All info on %s', 'espresso-wordpress-diagnostics'), $topic); ?>">[?]</a></h3>
        <?php if (isset($info[$topic]) && !empty($info[$topic]) && is_array($info[$topic])) { ?>
            <table class="espresso_table widefat" cellspacing="0" id="status">
                <thead>
                    <tr>
                        <th data-export-label="<?php echo __("Field", 'espresso-wordpress-diagnostics'); ?>"><?php echo __("Field", 'espresso-wordpress-diagnostics'); ?></th>
                        <th data-export-label="<?php echo __("Value", 'espresso-wordpress-diagnostics'); ?>"><?php echo __("Value", 'espresso-wordpress-diagnostics'); ?></th>
                    </tr>
                </thead>
                
                <tbody><?php
                    foreach ($info[$topic] as $field=>$value) { ?>
                        <tr>
                            <td data-export-label="<?php echo $field ?>"><?php echo $field; ?></td>
                            <td data-export-label="<?php echo $value ?>"><?php echo $value; ?></td>
                        </tr><?php
                    } ?>
                    
                </tbody>
            </table><?php
        } else { ?>
            <p><?php echo sprintf(__("There is no info regarding '%s'",'espresso-wordpress-diagnostics'), $topic); ?></p><?php
        }
    } ?>

</div><!-- /.wrap -->

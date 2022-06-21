<?php

function dir2array($root)
{
    $dirs = [];
    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($root),
        RecursiveIteratorIterator::SELF_FIRST
    );

    foreach ($iterator as $file) {
        if ($file->getFilename() == '..' || $file->getFilename() == '.')
            continue;

        $dirs[] = $file->getBasename();
    }

    return $dirs;
}

function rename_alldirs($root, $old_string, $new_string)
{
    if (!is_dir($root)) {
        return;
    }

    $dirs = scandir($root);
    //var_dump($dirs);

    foreach ($dirs as $dir) {
        if ($dir == '.' || $dir == '..') {
            continue;
        }
        $path = $root . '/' . $dir;
        if (is_file($path)) {

            $newFile = str_replace($old_string, $new_string, $path);
            if ($path != $newFile) {
                rename($path, $newFile);
            }
        } else if (is_dir($path)) {

            $newFile = str_replace($old_string, $new_string, $path);
            if ($path != $newFile) {
                rename($path, $newFile);
            }
            rename_alldirs($newFile, $old_string, $new_string);
        }
    }
}

function find_replace(string $root, $search, $replace)
{
    if (!is_dir($root)) {
        return;
    }
    $regex_filepath = glob($root . "/*"); //read all files in current directory
    //print_r($regex_filepath); //test result for debug
    //var_dump($regex_filepath);
    // go through selected files, and perform a search and replace for multiple strings using array
    foreach ($regex_filepath as $path) {
        if (!is_dir($path)) {
            $file = file_get_contents($path);
            //var_dump($path);
            file_put_contents($path, str_replace(
                $search,
                $replace,
                $file
            ));
        } elseif (is_dir($path)) {
            find_replace($path, $search, $replace);
        }
    }

    //$dirs = scandir($root);
    //var_dump($dirs);

    /* foreach ($dirs as $dir) {
        if ($dir == '.' || $dir == '..') {
            continue;
        }
        //$path = $root . '/' . $dir;
        if (is_dir($dir)) {
            find_replace($dir, $search, $replace);
        }
    } */
}

function prep_names(string $textdomain): array
{
    $names_replaces = [];
    $underscore_delim = str_replace("-", "_", $textdomain);
    $underscore_delim_lowercase = strtolower($underscore_delim);
    $underscore_delim_uppercase = strtoupper($underscore_delim);
    $underscore_delim_firstcase = ucwords($underscore_delim, "_");

    $names_find = ["plugin-name", "plugin_name", "Plugin_Name", "PLUGIN_NAME"];
    $names_replaces = [$textdomain, $underscore_delim_lowercase, $underscore_delim_firstcase, $underscore_delim_uppercase];

    $prepednames = ["find" => $names_find, "replace" => $names_replaces];

    return $prepednames;
}

function prep_plugin_details(array $details): string
{
    $customized = <<<EOD
    <?php

    /**
     *  * The plugin bootstrap file
     *
     * This file is read by WordPress to generate the plugin information in the plugin
     * admin area. This file also includes all of the dependencies used by the plugin,
     * registers the activation and deactivation functions, and defines a function
     * that starts the plugin.
     *
     * @link              {$details['titleurl']}
     * @since             {$details['version']}
     * @package           Plugin_Name
     *
     * @wordpress-plugin
     * Plugin Name:       {$details['title']}
     * Plugin URI:        {$details['titleurl']}
     * Description:       {$details['description']}
     * Version:           {$details['version']}
     * Author:            {$details['author']}
     * Author URI:        {$details['authorurl']}
     * License:           {$details['license']}
     * License URI:       {$details['licenseurl']}
     * Text Domain:       {$details['textdomain']}
     * Domain Path:       /languages
     */
    
    // If this file is called directly, abort.
    if ( ! defined( 'WPINC' ) ) {
        die;
    }
    
    /**
     * Currently plugin version.
     * Start at version 1.0.0 and use SemVer - https://semver.org
     * Rename this for your plugin and update it as you release new versions.
     */
    define( 'PLUGIN_NAME_VERSION', '1.0.0' );
    
    /**
     * The code that runs during plugin activation.
     * This action is documented in includes/class-plugin-name-activator.php
     */
    function activate_plugin_name() {
        require_once plugin_dir_path( __FILE__ ) . 'includes/class-plugin-name-activator.php';
        Plugin_Name_Activator::activate();
    }
    
    /**
     * The code that runs during plugin deactivation.
     * This action is documented in includes/class-plugin-name-deactivator.php
     */
    function deactivate_plugin_name() {
        require_once plugin_dir_path( __FILE__ ) . 'includes/class-plugin-name-deactivator.php';
        Plugin_Name_Deactivator::deactivate();
    }
    
    register_activation_hook( __FILE__, 'activate_plugin_name' );
    register_deactivation_hook( __FILE__, 'deactivate_plugin_name' );
    
    /**
     * The core plugin class that is used to define internationalization,
     * admin-specific hooks, and public-facing site hooks.
     */
    require plugin_dir_path( __FILE__ ) . 'includes/class-plugin-name.php';
    
    /**
     * Begins execution of the plugin.
     *
     * Since everything within the plugin is registered via hooks,
     * then kicking off the plugin from this point in the file does
     * not affect the page life cycle.
     *
     * @since    1.0.0
     */
    function run_plugin_name() {
    
        \$plugin = new Plugin_Name();
        \$plugin->run();
    
    }
    run_plugin_name();
    
EOD;

    return $customized;
}

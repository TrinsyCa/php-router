<?php

/**
 * Please configure the settings in env.php before running this script.
 * To generate the .htaccess file, run the following command in your terminal:
 * 
 * php trinsy make:htaccess
 */

// Load environment settings
include('env.php');

$AppName = env("APP_NAME");
$Directory = env("DIRECTORY");

// Validate necessary variables
if (!isset($AppName) || !isset($Directory)) {
    die("Error: Please set the required variables in .env");
}

// Ensure the base directory has a trailing slash
if(!empty($Directory)) {
    if (substr($Directory, -1) !== '/') {
        $Directory .= "/";
    }
}

// Define the .htaccess content
$htaccessContent = <<<EOT
RewriteEngine On

# Redirect for the specific URL
RewriteCond %{REQUEST_URI} ^/{$Directory}{$AppName}/$
RewriteRule ^$ settings/routes.php [L]

# Redirect all other requests to routes/routes.php if the file or directory does not exist
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ settings/routes.php [L,QSA]

EOT;

// Write the content to the .htaccess file
file_put_contents(__DIR__ . '/../.htaccess', $htaccessContent);

echo ".htaccess file has been generated successfully.";

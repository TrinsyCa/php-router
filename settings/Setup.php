<?php

namespace TrinsyCa\PhpRouter;

class Setup
{
    public static function postCreateProject($event)
    {
        $projectRoot = getcwd();
        $projectName = basename($projectRoot);
        $envFile = $projectRoot . DIRECTORY_SEPARATOR . '.env';

        $envContent = file_exists($envFile) ? file_get_contents($envFile) : '';

        $envContent .= "\nAPP_NAME={$projectName}\n";
        $envContent .= "DIRECTORY=" . basename(dirname($projectRoot)) . "\n";

        file_put_contents($envFile, $envContent);

        shell_exec('php trinsy make:htaccess');

        echo "\nTrinsy >>> Project setup complete.\n";
    }
}

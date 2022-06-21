<?php

namespace App\Command\Help;

use Minicli\App;
use Minicli\Command\CommandController;

class DefaultController extends CommandController
{
    /** @var  array */
    protected $command_map = [];

    public function boot(App $app)
    {
        parent::boot($app);
        $this->command_map = $app->command_registry->getCommandMap();
    }

    public function handle()
    {
        $this->getPrinter()->info('Available Commands');
        $helptext = <<<EOD
        DETAILED USAGE INSTRUCTIONS:
            ___________
            FOR THEME
            ___________
            Initialize new Theme development From a theme file directory.
            `wpboot theme` This would initialize the boilerplate scaffolding in the current directory or folder.

            If Running from the /themes/ directory, specify theme folder name using the folder parameter e.g
            `wpboot theme folder="newtheme"` This would create the folder and initialize the boilerplate
            scaffolding in the created directory or folder.

            ___________
            FOR PLUGIN
            ___________
            Initialize new Plugin Development From the Plugin Directory
            `wpboot plugin` make sure you provide accurate plugin folder name in the Text Domain Field as this
            would be used programmatically to help you follow accordingly with the WordPress Naming Standards.
    EOD;

        foreach ($this->command_map as $command => $sub) {

            $this->getPrinter()->newline();
            $this->getPrinter()->out($command, 'info_alt');

            if (is_array($sub)) {
                foreach ($sub as $subcommand) {
                    if ($subcommand !== 'default') {
                        $this->getPrinter()->newline();
                        $this->getPrinter()->out(sprintf('%s%s', '└──', $subcommand));
                    }
                }
            }
            $this->getPrinter()->newline();
        }

        $this->getPrinter()->newline();

        $app->getPrinter()->newline();
        $app->getPrinter()->info($helptext);
        $this->getPrinter()->newline();
        $this->getPrinter()->newline();
    }
}

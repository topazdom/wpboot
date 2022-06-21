<?php

namespace App\Command\Theme;

use Minicli\Command\CommandController;
use Minicli\Input;
use Symfony\Component\Filesystem\Filesystem;

class DefaultController extends CommandController
{
    public function handle()
    {
        // TODO: Check if the CLI is running from a wordpress installation, and by extension the Theme Directory.
        $this->getPrinter()->info('Initializing New WordPress Theme Scafffold');
        $this->getPrinter()->info('Provide the projects details to begin');

        $title = (new Input('What is the Theme Title?:  '))->read();
        $this->getPrinter()->newline();
        $titleurl = (new Input('What is the Theme URI?:  '))->read();
        $this->getPrinter()->newline();
        $description = (new Input('Theme Description?:  '))->read();
        $this->getPrinter()->newline();
        $author = (new Input('What is the name of the Author?:  '))->read();
        $this->getPrinter()->newline();
        $authorurl = (new Input('What is the Author URI?:  '))->read();
        $this->getPrinter()->newline();
        $textdomain = (new Input('Text Domain (Slug)?:  '))->read();
        $this->getPrinter()->newline();
        $tags = (new Input('Tags (seperated by comma)?:  '))->read();

        $this->getPrinter()->info('Inputs Processed Successfully');
        $this->getPrinter()->display('Preparing to copy files');

        $themeDir = '.';
        if ($this->hasParam('folder')) {
            $themeDir = './' . $this->getParam('folder');
        }

        $filesystem = new Filesystem();
        $filesystem->mirror(__DIR__ . '/../../Stubs/theme-scaffold', $themeDir);
        $this->getPrinter()->info('Files Copied Successfully');

        $cssorigin = $themeDir . '/style.css';
        $details = [
            'title'=>$title,
            'themeuri'=>$titleurl,
            'author'=>$author,
            'authoruri'=>$authorurl,
            'description'=>$description,
            'text-domain'=>$textdomain,
            'tags'=>$tags
        ];
        $this->prepend($this->prepDetails($details),$cssorigin);
        $this->getPrinter()->success('Theme Scaffold initialized Successfully. Go to your WP Admin Dashboard and Install theme. Happy Coding, Enjoy Development!');

        $this->getPrinter()->newline();
    }

    public function prepend($string, $orig_filename)
    {
        $context = stream_context_create();
        $orig_file = fopen($orig_filename, 'r', 1, $context);

        $temp_filename = tempnam(sys_get_temp_dir(), 'php_prepend_');
        file_put_contents($temp_filename, $string);
        file_put_contents($temp_filename, $orig_file, FILE_APPEND);

        fclose($orig_file);
        unlink($orig_filename);
        rename($temp_filename, $orig_filename);
    }

    public function prepDetails(array $details)
    {
        $themeDetails = <<<EOD
     /*
     Theme Name: {$details['title']}
     Theme URI: {$details['themeuri']}
     Author: {$details['author']}
     Author URI: {$details['authoruri']}
     Description: Custom theme: {$details['description']}
     Version: 1.0.0
     License: GNU General Public License v2 or later
     License URI: http://www.gnu.org/licenses/gpl-2.0.html
     Text Domain: {$details['text-domain']}
     Tags: {$details['tags']}
     
     This theme, like WordPress, is licensed under the GPL.
     Use it to make something cool, have fun, and share what you've learned with others.
     
     WP Theme Scaffold is based on Underscores http://krafthaus.co.id/, (C) 2012-2016 Automattic, Inc.
     Underscores is distributed under the terms of the GNU GPL v2 or later.
     
     Normalizing styles have been helped along thanks to the fine work of
     Nicolas Gallagher and Jonathan Neal http://necolas.github.com/normalize.css/
     */
     
     /*--------------------------------------------------------------
     >>> TABLE OF CONTENTS:
     ----------------------------------------------------------------
     # Normalize
     # Typography
     # Elements
     # Forms
     # Navigation
         ## Links
         ## Menus
     # Accessibility
     # Alignments
     # Clearings
     # Widgets
     # Content
         ## Posts and pages
         ## Comments
     # Infinite scroll
     # Media
         ## Captions
         ## Galleries
     --------------------------------------------------------------*/
     
     /*--------------------------------------------------------------
     # Normalize
     --------------------------------------------------------------*/ 
EOD;
        return $themeDetails;
    }
}

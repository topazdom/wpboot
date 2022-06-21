<?php

namespace App\Command\Plugin;

use Minicli\Command\CommandController;
use Minicli\Input;
use Symfony\Component\Filesystem\Filesystem;

class DefaultController extends CommandController
{
  public function handle()
  {
    // TODO: Check if the CLI is running from a wordpress installation, and by extension the Theme Directory.
    $this->getPrinter()->info('Initializing New WordPress Plugin Scafffold');
    $this->getPrinter()->info('Provide the projects details to begin');

    $title = (new Input('What is the Plugin Name (Title)? e.g Scaffold Plugin Name:  '))->read();
    $this->getPrinter()->newline();
    $textdomain = (new Input('Text Domain (Slug)? This Field is Very Important and is Recommended to be a Slug of The Title eg scaffold-plugin-name:  '))->read();
    $this->getPrinter()->newline();
    $titleurl = (new Input('What is the Plugin URI? e.g http://example.com/:  '))->read();
    $this->getPrinter()->newline();
    $description = (new Input('Plugin Description?:  '))->read();
    $this->getPrinter()->newline();
    $version = (new Input('Plugin Version? e.g 1.0.0:  '))->read();
    $this->getPrinter()->newline();
    $author = (new Input('What is the name of the Author?:  '))->read();
    $this->getPrinter()->newline();
    $authorurl = (new Input('What is the Author URI?:  '))->read();
    $this->getPrinter()->newline();
    $license = (new Input('Plugin License?:  '))->read();
    $this->getPrinter()->newline();
    $licenseurl = (new Input('Plugin License URI? e.g http://www.gnu.org/licenses/gpl-2.0.txt:  '))->read();
    $this->getPrinter()->newline();
    // $tags = (new Input('Domain Path?:  '))->read();

    $this->getPrinter()->info('Inputs Processed Successfully');
    $this->getPrinter()->display('Preparing to copy files');

    /* $themeDir = '.';
    if ($this->hasParam('folder')) {
      $themeDir = './' . $this->getParam('folder');
    }
    $themeDir = $textdomain; */

    $filesystem = new Filesystem();
    $filesystem->mirror(__DIR__ . '/../../Stubs/plugin-scaffold', $textdomain);
    $this->getPrinter()->success('Files Copied Successfully');
    $this->getPrinter()->info('Customizing Copied Files');

    $details = [
      'title' => $title,
      'pluginurl' => $titleurl,
      'author' => $author,
      'authorurl' => $authorurl,
      'license' => empty($license) ? "GPL-2.0+" : $license,
      'licenseurl' => empty($licenseurl) ? "http://www.gnu.org/licenses/gpl-2.0.txt" : $licenseurl,
      'description' => $description,
      'textdomain' => $textdomain,
      'version' => empty($version) ? "1.0.0" : $version
    ];
    $orig_plugin_file = realpath($textdomain) . "/plugin-name.php";
    $string = prep_plugin_details($details);
    file_put_contents($orig_plugin_file, $string);
    $this->getPrinter()->success('Plugin Details Compiled.');

    $this->rename_scaffolds($textdomain);

    $this->search_and_replace_files_content($textdomain);
    $this->getPrinter()->success('Plugin Scaffold Initialized Successfully. Go to your WP Admin Dashboard and Install theme. Happy Coding, Enjoy Development!');

    $this->getPrinter()->newline();
  }

  public function search_and_replace_files_content($textdomain)
  {
    $root = realpath($textdomain);
    $namesarray = prep_names($textdomain); //var_dump($namesarray);
    find_replace($root, $namesarray['find'], $namesarray['replace']);
    $this->getPrinter()->success("Replaced Plugin Files Contents Successfuly");
    return true;
  }

  public function rename_scaffolds($textdomain)
  {
    $root = realpath($textdomain);
    $old_string = 'plugin-name';

    rename_alldirs($root, $old_string, $textdomain);

    $this->getPrinter()->success("Renamed Plugin Files Successfuly");
    return true;
  }
}

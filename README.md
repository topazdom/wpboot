<p align="center">
<img src="https://github.com/topazdom/wpboot/blob/master/screenshot.png?raw=true" align="center" alt="logo" title="WPboot logo" alt="WPboot Logo" width="160">
</p>

<p align="center">
    <a href="//packagist.org/packages/topazdom/wpboot">
        <img src="https://poser.pugx.org/topazdom/wpboot/v" alt="Latest Stable Version" title="Latest Stable Version">
    </a>
    <a href="//packagist.org/packages/topazdom/wpboot">
        <img src="https://poser.pugx.org/topazdom/wpboot/downloads" alt="Total Downloads" title="Total Downloads">
    </a>
    <a href="//packagist.org/packages/topazdom/wpboot">
        <img src="https://poser.pugx.org/topazdom/wpboot/license" alt="License" title="License">
    </a>
    <h1 align="center">
        WPboot CLI
    </h1>
</p>
<br>

# wpboot

[WPboot](https://github.com/topazdom/wpboot) is A Free and OpenSource Lightweight CLI app to bootstrap WordPress Theme and Plugin Development created by @zaghadon.
This repository is the official repository for `wpboot` and a continuation of the previous [Themeboot](https://github.com/zaghadon/themeboot) project.

## Why wpboot

I build Plugins and Themes as a freelancer for different people and want to quickly start off with a simple project scaffold that is why I created wpboot, to help me start a new project easily by simply supplying the details of the Project and Initializing it in a boilerplate; if you use it and you like it, Just send me your project link let me list it on the `Created with`. Thank you <3

# Getting Started

You'll need `php-cli`, [Composer](https://getcomposer.org/) and A local [WordPress](https://wordpress.org) installation to get started.

**Simple Installation:**

There are 2 easy ways to install WPBoot in your computer. 

____
First and the recommended way is through Composer Global Require, One Line Command.
Make sure to place Composer's system-wide vendor bin directory in your $PATH so the wpboot executable can be located by your system. 

This directory exists in different locations based on your operating system; however, some common locations include:

macOS: `$HOME/.composer/vendor/bin`
Windows: `%USERPROFILE%\AppData\Roaming\Composer\vendor\bin`
GNU / Linux Distributions: `$HOME/.config/composer/vendor/bin or $HOME/.composer/vendor/bin`

<details>
<summary>Show me how</summary>

If it's not already there, add the following line to your Bash configuration file (usually `~/.bash_profile`, `~/.bashrc`, `~/.zshrc`, etc.):

```
export PATH=~/.composer/vendor/bin:$PATH
```

If the file doesn't exist, create it.

Run the following command on the file you've just updated for the change to take effect:

```
source ~/.bash_profile
```

You could also find the composer's global installation path by running `composer global about` and looking up from the first line.
</details>

TO INSTALL:

- Run `composer global require topazdom/wpboot` to install WPboot Globally in your computer.
- Run `wpboot` to verify successful installation.

____
Another Way is to clone the project directly to your computer. Change Directory to the cloned project and Install composer dependency.

- Run `git clone https://github.com/topazdom/wpboot.git`
- Run `cd wpboot`
- Run `composer install`

Manually export wpboot binary to your PATH to make it available globally by:
- Windows : Adding the path to `wpboot` to system PATH variable.
- Linux : Run `sudo ln -s /usr/local/bin/wpboot /path/to/wpboot` replacing path to with your wpboot installation location. This would create a symlink between your local global bin folder and wpboot executable binary.
- Mac: Run `echo 'export PATH="$PATH:$HOME/path/to/wpboot"' >> ~/.zshrc` to export the binary to PATH. You'll need to restart the terminal for the new bash file to take effect.

- Run `wpboot` to verify successful installation.

**Simple Usage:**

Change Directory to the theme or plugin Folder of your wordpress installation.

    `cd **/wp-content/themes/` OR  `cd **/wp-content/plugins/`.
    ___________
    FOR THEME
    ___________
    Initialize new Theme development From a theme file directory.
    `wpboot theme` This would initialize the boilerplate scaffolding in the current directory or folder.

    If Running from the /themes/ directory, specify theme folder name using the folder parameter e.g
     `wpboot theme folder="newtheme"` This would create the folder and initialize the boilerplate scaffolding in the created directory or folder.

    ___________
    FOR PLUGIN
    ___________
    Initialize new Plugin Development From the Plugin Directory
    `wpboot plugin` make sure you provide accurate plugin folder name in the Text Domain Field as this would be used programmatically to help you follow accordingly with the WordPress Naming Standards.


# Contributing

Contributions are very welcome! You can contribute with code, documentation, filing issues...

# TO DO

*   Plan and Write Unit Tests for testing the commands.
*   Enforce compliance during inputs, by validating inputs and securing users against themselves.
*   Help Share to many WordPress Developers communities.
*   Star and Watch to keep up with the evoluton.

# Credits

* WP Theme Scaffold created by @krafthaus_ is based on Underscores http://krafthaus.co.id/, (C) 2012-2016 Automattic, Inc.
Underscores is distributed under the terms of the GNU GPL v2 or later.

* [WordPressPluginBoilerplate](https://wppb.io) A foundation for WordPress Plugin Development that aims to provide a clear and consistent guide for building your plugins. 
A standardized, organized, object-oriented foundation for building high-quality WordPress Plugins.

* [Minicli](https://github.com/minicli/minicli) is an experimental dependency-free toolkit for building CLI-centric applications in PHP.
Minicli was created as [an educational experiment](https://dev.to/erikaheidi/bootstrapping-a-cli-php-application-in-vanilla-php-4ee) and a way to go dependency-free when building simple command-line applications in PHP. It can be used for microservices, personal dev tools, bots and little fun things.

# Created with WPboot

- [Themester](https://github.com/topazdom/themester) - a Multipurpose WordPress Theme for building beautiful dynamic websites (Under Development).
- [BizList](https://github.com/topazdom/bizlist) - a Business Listing Plugin for Leads, Directory Listing Prefill and etc. Finds Businesses By Scrapping Google Businesses, Local Directories and Social Medias.

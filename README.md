# Nightingale WordPress theme

This is a WordPress theme that implements the NHS Leadership Academy front-end framework [Nightingale](https://github.com/NHSLeadership/nightingale).

## Introduction

Please checkout the [contributing instructions](CONTRIBUTING.md) before pitching in.

### Installation instructions

Please note: this theme is intended for *self-hosted* WordPress sites only (as described at [WordPress.org](https://wordpress.org)) and not for sites hosted at [WordPress.com](https://wordpress.com).

#### WordPress

If WordPress is not already installed, follow the [WordPress installation instructions](https://codex.wordpress.org/Installing_WordPress) to install it.

#### Node.js

This theme uses the Node.js package. Check it's installed with the following command: ````node --version````

If the response is anything other than ````vx.x.x LTS```` then you'll need to download and install the latest LTS version as described at [nodejs.org](https://nodejs.org/en/).

#### Installing the theme

You can either use Git to install the theme or you can download it:

##### Using Git

1. If Git is not already installed, get it from the [Git download page](https://git-scm.com/downloads) and install it.
2. From the command line, go to the wp-content/themes folder for your WordPress site and clone the repository containing this theme with the following command: ````git clone git@github.com:NHSLeadership/nightingale-wp.git````

##### Via download

1. Download the theme as a zip file from [here](https://github.com/NHSLeadership/nightingale-wp/archive/master.zip).
2. Unzip the downloaded file and upload the folder contained in it to the wp-content/themes folder for your WordPress site. The result should be a folder named nightingale-wp in your themes folder.

####Installing the theme modules

This theme relies on a number of open source code 'modules'. Install the required modules by going into the wp-content/themes/nightingale-wp/node_modules folder and entering the following commands: ````npm install```` and ````npm update````

####Compiling the CSS

This theme uses [SASS](http://sass-lang.com/), so you will need to compile your CSS file by going into the wp-content/themes/nightingale-wp/assets folder and entering the following command: ````npm run build````

####Final Steps

Nightingale should now be available in your WordPress admin dashboard, ready to be activated, under Appearance > Themes.

### Deployment

[ ] Add instructions for deploying to staging and production
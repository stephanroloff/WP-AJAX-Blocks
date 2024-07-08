# Plugin Scaffold

1-Replace name of your Plugin in:

    -composer.json in "psr-4"
    -RegisterBlocks.php
    -functions.php (Plugin Name, namespaces and MY_PLUGIN_PATH_WP_REST_API)
    -Main folder

2-If you want hot reload. Replace the value of you local enviroment in webpack.config.js in:

proxy: 'http://localhost:10095/'

- How to start Plugin:
  npm install
  composer install

- Don't forget everytime you change the composer.json file to run:
  composer dump-autoload
# WP-AJAX-Blocks

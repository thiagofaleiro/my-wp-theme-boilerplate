'use strict';

module.exports = function(grunt) {

    var path = require('path');

    // measures the time each task takes
    require('time-grunt')(grunt);

    // load-grunt-config includes load-grunt-tasks
    require('load-grunt-config')(grunt, {
        configPath: path.join(process.cwd(), '_grunt'),
        data: {
            pkg: grunt.file.readJSON('package.json'),
            path: {
                main: '.',
                src:  'assets/dev',
                dest: 'assets',
                build: 'build',
                lib:  'bower_components'
            },
            banner:
              '\n' +
              '/*\n' +
              ' * -------------------------------------------------------\n' +
              ' * Theme Name: <%= pkg.title %> \n' +
              ' * Description: <%= pkg.date %> \n' +
              ' * Version: <%= pkg.version %> \n' +
              ' * Author:  <%= pkg.author.name %> (<%= pkg.author.email %>) \n' +
              ' * Author URI: <%= pkg.author.url %> \n' +
              ' *\n' +
              ' * Copyright (c) <%= grunt.template.today(\'yyyy\') %> <%= pkg.title %>\n' +
              ' * -------------------------------------------------------\n' +
              ' */\n' +
              '\n'
        }
    });
};

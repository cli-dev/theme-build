module.exports = function(grunt) {
  var path = require('path');
  require('load-grunt-config')(grunt, {
    data: grunt.file.readYAML('config.yml'),
    configPath: path.join(process.cwd(), 'grunt/config'),
    jitGrunt: {
      customTasksDir: 'grunt/tasks',
      staticMappings: {
        notify_hooks: 'grunt-notify',
        sass: 'grunt-sass'
      }
    }
  });
}; 
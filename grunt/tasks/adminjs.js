module.exports = function(grunt) {
  grunt.task.registerTask('adminjs', [
    'uglify:back', 
    'sync:dist',
    'notify:js'
  ]);
}
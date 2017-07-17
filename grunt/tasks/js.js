module.exports = function(grunt) {
  grunt.task.registerTask('js', [
    'decomment', 
    'uglify'
  ]);
}
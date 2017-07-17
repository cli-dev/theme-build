module.exports = function(grunt) {
  grunt.task.registerTask('build', [
    'bower',
    'bower_concat',
    'decomment', 
    'sassGlobber', 
    'sass', 
    'postcss',
    'concat:css',
    'combine_mq', 
    'cssmin',  
    'rtlcss',
    'uglify',
    'sync:dist'
  ]);
}
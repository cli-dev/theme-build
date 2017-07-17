module.exports = function(grunt) {
  grunt.task.registerTask('css', [
    'sassGlobber', 
    'sass', 
    'combine_mq', 
    'postcss', 
    'decomment:css', 
    'cssmin',  
    'rtlcss'
  ]);
}
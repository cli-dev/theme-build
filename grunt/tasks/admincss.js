module.exports = function(grunt) {
  grunt.task.registerTask('admincss', [
    'sassGlobber',
    'sass:back',
    'combine_mq:backend',
    'postcss:admin',
    'cssmin:backend',
    'sync:dist',
    'notify:css'
  ]);
}
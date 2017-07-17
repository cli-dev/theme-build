module.exports = {
  configFiles: {
    files: [ 'gruntfile.js', 'grunt/**/*.js' ],
    options: {
      reload: true
    }
  },
  php: {
    files: [
      '<%= build_php_dir %>/**'
    ],
    tasks: [
      'sync:php',
      'sync:dist',
      'notify:php'
    ]
  },
  js: {
    files: [
      '<%= build_js_dir %>/main.js'
    ],
    tasks: [
      'decomment:js', 
      'uglify:front', 
      'sync:dist',
      'notify:js'
    ]
  },
  css: {
    files: [
      '<%= build_sass_dir %>/01-global/**',
      '<%= build_sass_dir %>/02-partials/**'
    ],
    tasks: [
      'sassGlobber',
      'sass:front',
      'combine_mq',
      'postcss',
      'decomment:css',
      'cssmin',
      'rtlcss',
      'concat',
      'sync:dist',
      'notify:css'
    ]
  },
  adminjs: {
    files: [
      '<%= build_js_dir %>/admin.js'
    ],
    tasks: [
      'uglify:back', 
      'sync:dist',
      'notify:js'
    ]
  },
  admincss: {
    files: [
      '<%= build_sass_dir %>/01-global/**',
      '<%= build_sass_dir %>/03-admin/**'
    ],
    tasks: [
      'sassGlobber',
      'sass:back',
      'combine_mq:backend',
      'postcss:admin',
      'cssmin:backend',
      'sync:dist',
      'notify:css'
    ]
  }
};
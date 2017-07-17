module.exports = {
  all: {
    dest: {
      js: '<%= tmp_js_dir %>/bower.js',
      css: '<%= tmp_css_dir %>/bower.css'
    },
    exclude: [
      'jquery',
      'breakpoint-sass',
      'mathsass',
      'modular-scale',
      'sassy-maps',
      'get-size',
      'fizzy-ui-utils',
      'desandro-matches-selector',
      'masonry',
      'outlayer',
      'packery',
      'uniform',
      'ev-emitter'
    ],
    mainFiles: {
      'fancybox': [
        'dist/jquery.fancybox.css', 
        'dist/jquery.fancybox.js'
      ],
      'font-awesome': [
        'css/font-awesome.css'
      ],
      'isotope': [
        'dist/isotope.pkgd.js'
      ],
      'isotope-packery': [
        'packery-mode.pkgd.js'
      ],
      'imagesloaded': [
        'imagesloaded.pkgd.js'
      ],
      'select2': [
        'dist/css/select2.css', 
        'dist/js/select2.full.js'
      ],
      'waypoints': [
        'lib/jquery.waypoints.js',
        'lib/shortcuts/infinite.js',
        'lib/shortcuts/inview.js',
        'lib/shortcuts/sticky.js'
      ]
    },
    dependencies: {
      'isotope': 'imagesloaded',
      'isotope-packery': 'isotope',
      'owl.carousel2.thumbs': 'owl-carousel2'
    },
    bowerOptions: {
      relative: false
    }
  }
};
module.exports = {
  dev: {
    dest: '<%= tmp_dir %>',
    fonts_dest: '<%= dist_fonts_dir %>',
    images_dest: '<%= tmp_imgs_dir %>',
    options: {
      ignorePackages: [
        "animate.css",
        "animated.js",
        "background-check",
        "bigtext",
        "breakpoint-sass",
        "desandro-matches-selector",
        "ev-emitter",
        "fancybox",
        "fizzy-ui-utils",
        "get-size",
        "imagesloaded",
        "isotope",
        "isotope-packery",
        "jquery",
        "jquery.uniform",
        "masonry",
        "mathsass",
        "modernizer",
        "modular-scale",
        "normalize-css",
        "outlayer",
        "owl-carousel2",
        "owl.carousel2.thumbs",
        "packery",
        "sassy-maps",
        "select2",
        "uniform",
        "waypoints",
        "wow",
        "zenscroll"
      ],
      keepExpandedHierarchy: false,
      stripGlobBase: true,
      expand: false,
      packageSpecific: {
        'elegant-icons': {
          files: ['fonts/**']
        },
        'font-awesome': {
          files: ['fonts/**']
        }
      }
    }
  }
};
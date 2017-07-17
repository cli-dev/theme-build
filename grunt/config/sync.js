module.exports = {
  php: {
    files: [{
      cwd: '<%= build_php_dir %>',
      src: ['**'],
      dest: '<%= dist_dir %>'
    }],
    verbose: true,
    failOnError: true,
    updateAndDelete: false,
    compareUsing: 'md5'
  },
  fonts: {
    files: [{
      cwd: '<%= build_fonts_dir %>',
      src: ['**'],
      dest: '<%= dist_fonts_dir %>'
    }],
    verbose: true,
    failOnError: true,
    updateAndDelete: false,
    compareUsing: 'md5'
  },
  child: {
    files: [{
      src: [
        '<%= build_sass_dir %>/02-partials/01-utilities/_grid.scss',
        '<%= build_php_dir %>/templates/blog/layouts/**'
      ],
      dest: '../theme-child-build/build'
    }],
    verbose: true,
    failOnError: true,
    updateAndDelete: false,
    compareUsing: 'md5'
  },
  dist: {
    files: [{
      cwd: 'dist/',
      src: ['**'],
      dest: '../theme/'
    }],
    verbose: true,
    failOnError: true,
    updateAndDelete: true,
    compareUsing: 'md5',
    ignoreInDest: 'css/dynamic-styles.css'
  }
};
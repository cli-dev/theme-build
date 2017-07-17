module.exports = {  
  options: {
    mergeIntoShorthands: true,
    roundingPrecision: -1,
    sourceMap: true
  },
  frontend: {
    files: [{
      expand: false,
      src: ['<%= tmp_css_dir %>/style.css'],
      dest: '<%= dist_css_dir %>/style.min.css'
    }]
  },
  backend: {
    files: [{
      expand: false,
      src: ['<%= tmp_css_dir %>/admin.css'],
      dest: '<%= dist_css_dir %>/admin.min.css'
    }]
  }
}
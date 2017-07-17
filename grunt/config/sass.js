module.exports = {
  options: {
    sourceMap: true
  },
  front: {
    files: [{
      '<%= build_css_dir %>/main.css': '<%= build_sass_dir %>/main.scss'
    }]
  },
  back: {
    files: [{
      '<%= build_css_dir %>/admin.css': '<%= build_sass_dir %>/admin.scss'
    }]
  }
};
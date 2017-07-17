module.exports = {
  options: {
    sourceMap: true,
    mangle: false
  },
  front: {
    files: {
      '<%= dist_js_dir %>/scripts.min.js': [
        '<%= tmp_js_dir %>/bower.js',
        '<%= build_js_dir %>/main.js',
      ]
    }
  },
  back: {
    files: {
      '<%= dist_js_dir %>/admin.min.js': [
        '<%= build_js_dir %>/admin.js',
      ]
    }
  }
};
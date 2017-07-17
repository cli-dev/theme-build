module.exports = {
  frontend: {
    expand: false,
    src: '<%= build_css_dir %>/main.css',
    dest: '<%= tmp_css_dir %>/main.css'
  },
  backend: {
    expand: false,
    src: '<%= build_css_dir %>/admin.css',
    dest: '<%= tmp_css_dir %>/admin.css'
  }
};
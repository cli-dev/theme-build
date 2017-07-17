module.exports = {
  css: {
    options: {
      type: 'text'
    },
    src: [
      '<%= tmp_css_dir %>/*.css'
    ],
    dest: './'
  },
  js: {
    src: [
      '<%= tmp_js_dir %>/*.js'
    ],
    dest: './'
  }
};
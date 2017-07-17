module.exports = {
  options: {
    files: ['<%= build_js_dir %>/*.js'],
    options: {
      jshintrc: '.jshintrc',
      reporter: require('jshint-stylish')
    }
  }
};
module.exports = {
  options: {
    sassRoot: '<%= build_sass_dir %>'
  },
  all: {
    files: [{
      'admin.scss': '_admin.scss',
      'main.scss': '_main.scss'
    }]
  }
};
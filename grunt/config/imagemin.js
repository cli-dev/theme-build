module.exports = {
  dynamic: {
    files: [{
      expand: true,
      cwd: '<%= build_img_dir %>',
      src: ['**/*.{png,jpg,gif,svg}'],
      dest: '<%= dist_img_dir %>/'
    }]
  }
};
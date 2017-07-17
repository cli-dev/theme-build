module.exports = {
  options: {
    sourceMap: true,
    processors: [
    require('pixrem')(), 
    require('autoprefixer')({browsers: 'last 2 versions', grid: true}),
    require('postcss-assets')({
      relative: '<%= dist_css_dir %>',
      loadPaths: ['fonts/', 'imgs/']
    })
    ]
  },
  all: {
    src: ['<%= build_css_dir %>/*.css']
  },
  admin: {
    src: ['<%= build_css_dir %>/admin.css']
  }
};
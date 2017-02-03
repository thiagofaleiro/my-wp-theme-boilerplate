module.exports = {
    options: {
      mangle: true,
      sourceMap: true,
      banner: '<%= banner %>'
    },
    dist: {
      files: {
        '<%= path.dest %>/js/main.min.js': ['<%= path.dest %>/js/main.js']
      }
    }
};

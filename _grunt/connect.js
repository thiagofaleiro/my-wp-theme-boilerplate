module.exports = {
    server: {
      options: {
          port: 9001,
          base: '<%= path.main %>',
          // hostname: 'localhost',
          hostname: '0.0.0.0',
          livereload: true,
          open: true
      }
    }
};

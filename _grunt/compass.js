module.exports = {
    options: {
      importPath: [
        '<%= path.lib %>/foundation-sites/scss',
        '<%= path.dest %>/fonts'
      ],
      basePath: '<%= path.dest %>',
      sassDir: 'dev/sass',
      cssPath: '<%= path.main %>',
      imagesDir: 'images',
      fontsDir: 'fonts',
      generatedImagesDir: 'images',
      outputStyle: 'compressed',
      noLineComments: true,
      relativeAssets: true,
      // force: true
    },
    dev: {
      options: {
        environment: 'development',
        outputStyle: 'compact'
      }
    },
    build: {
      options: {
        environment: 'production',
        outputStyle: 'compressed'
      }
    },
    clean: {
      options: {
        clean: true
      }
    }
};

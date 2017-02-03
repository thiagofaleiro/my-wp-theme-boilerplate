module.exports = {
    dist: {
      files: {
          "<%= path.dest %>/js/main.js": ["<%= path.src %>/js/*.js"]
      },
      options: {
        debug: true,
        transform: [
          [ "babelify", {presets: ["es2015"], sourceMapsAbsolute: true} ]
        ]
      }
    }
};

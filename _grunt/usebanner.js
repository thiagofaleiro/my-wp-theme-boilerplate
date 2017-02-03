module.exports = {
    dist: {
      options: {
        position: 'top',
        banner: '<%= banner %>'
      },
      files: {
        src: [ '<%= path.main %>/style.css' ]
      }
    }
};

// Hint: newer:taskName - configure Grunt tasks to run with newer files only.
module.exports = {
    options: {
        nospawn: true,
        debounceDelay: 250,
        livereload: true
    },
    html: {
        files: ['<%= path.main %>/**/*.html'],
        tasks: ['browserSync:dev']
    },
    css: {
        files: ['<%= path.src %>/**/*.{scss,sass}'],
        tasks: ['compass:dev', 'usebanner']
    },
    js: {
        files: ['<%= path.src %>/js/*.js'],
        tasks: ['jshint', 'browserify', 'uglify:dist']
    }
};

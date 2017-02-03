module.exports = {
    build_js: [['clean:js', 'concat:libs'], ['browserify', 'uglify:dist']],
    build_css: [['compass:clean', 'compass:build', 'usebanner']],
    build: ['concurrent:build_css', 'concurrent:build_js'],
    dist: [['compass:dev', 'usebanner'], 'concurrent:build_js'],
    lint: ['csslint', 'jshint'],
    runserver: ['watch', 'connect']
};

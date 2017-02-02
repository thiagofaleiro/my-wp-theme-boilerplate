module.exports = {
    build: ['compass:dev', 'browserify', 'uglify', 'concat:dist'],
    lint: ['csslint', 'jshint'],
    runserver: ['watch', 'django-manage:runserver']
};
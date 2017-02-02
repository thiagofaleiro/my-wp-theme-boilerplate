module.exports = {
    dev: {
        files: {
            src: [
                '<%= path.dest %>css/*.css',
                '<%= path.dest %>js/*.js',
                '<%= path.main %>_html/*.html',
            ]
        },
        options: {
            watchTask: true,
            ghostMode: {
                scroll: true,
                links: true,
                forms: true
            }
        },
    }
};
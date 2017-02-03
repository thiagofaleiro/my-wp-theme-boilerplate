module.exports = {
    dev: {
        files: {
            src: [
                '<%= path.dest %>/css/*.css',
                '<%= path.dest %>/js/*.js'
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

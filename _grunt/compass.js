module.exports = {
    options: {
        basePath: '<%= path.src %>',
        sassDir: 'scss',
        cssDir: 'css',
        imagesDir: 'img',
        outputStyle: 'expanded',
        relativeAssets: true
    },
    dev: {
        options: {
            environment: 'development'
        }
    },
    dist: {
        options: {
            environment: 'production'
        }
    }
};

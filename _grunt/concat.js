module.exports = {
	dist: {
		src: [
			'<%= path.src %>/js/lib/jquery-1.11.0.min.js', 
			'<%= path.src %>/js/fancybox/jquery.fancybox.pack.js', 
			'<%= path.src %>/js/lib/imagesloaded.pkgd.min.js',
			'<%= path.src %>/js/lib/masonry.pkgd.min.js', 
		],
		dest: '<%= path.dest %>/js/libs.min.js',
	}
};
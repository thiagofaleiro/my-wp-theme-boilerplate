module.exports = {
	dist: {
		src: ['<%= path.src %>/js/*.js'],
		dest: '<%= path.dest %>/js/main.js'
	},
	libs: {
		src: [
			'<%= path.lib %>/jquery/dist/jquery.min.js',
			'<%= path.lib %>/mobile-detect/mobile-detect.min.js',
			'<%= path.lib %>/swiper/dist/js/swiper.min.js',
			'<%= path.lib %>/fancybox/source/jquery.fancybox.pack.js',
			'<%= path.lib %>/parallax.js/parallax.min.js',
			'<%= path.lib %>/jquery-mousewheel/jquery-mousewheel.min.js',
			'<%= path.lib %>/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js',
		],
		dest: '<%= path.dest %>/js/libs.min.js'
	}
};

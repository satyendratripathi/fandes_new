var config = {
	map: {
        "*": {
            lofSwiper: "Lof_BicomartCustom/js/swiper",
        }
    },
	paths: {
		'lof/swiperslider'			: 'Lof_BicomartCustom/js/swiper-bundle.min'
	},
	shim: {
		'lof/swiperslider': {
			deps: ['jquery']
		}
	}

};
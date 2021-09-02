define([
    "jquery",
    "lof/swiperslider"
], function($, Swiper) {
    "use strict";
    $.widget("lof.swiperSlider", {
        options: {},
        _create: function() {
            var self = this;
            const selectorName = self.options.elementId
            if($(selectorName).length > 0){
                var swiper = new Swiper(selectorName, {
                    slidesPerView: self.options.slidesPerView || 4,
                    spaceBetween: self.options.spaceBetween || 10,
                    pagination: {
                    el: self.options.pagination || ".swiper-pagination",
                    type: self.options.type || "progressbar",
                    }
                });
            }
        }
    });
    return $.lof.swiperSlider;
});
define([
    'jquery',
    'Magento_Catalog/js/catalog-add-to-cart'
], function ($) {
    "use strict";
    return function (config, element) {
        $(element).click(function () {
            var form = $(config.form);
            const adding_label = config.adding_label
            if(form.valid()) {
                $(element).find("span").text(adding_label)
                $(element).addClass("disabled")
                var widget = form.catalogAddToCart({
                    bindSubmit: false
                });
                widget.catalogAddToCart('submitForm', form);
            }
            return false;
        });
    }
});

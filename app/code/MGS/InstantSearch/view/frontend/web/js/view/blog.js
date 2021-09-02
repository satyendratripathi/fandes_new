/**
 * Copyright © 2013-2017 Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
define(
    [
        'ko',
        'jquery',
        'uiComponent'
    ],
    function (ko, $, Component) {
        'use strict';
        return Component.extend({
            defaults: {
                template: 'MGS_InstantSearch/search/blog',
                result: {
                    blog: {
                        data: ko.observableArray([]),
                        size: ko.observable(0),
                        url: ko.observable('')
                    }
                },
                isVisible: false
            },
            initialize: function () {
                var self = this;
                this._super();
                if(window.instantSearch.blog){
                    self.result.blog = window.instantSearch.blog;
                }
                this.isVisible = ko.computed(function () {
                    var sum = self.result.blog.size();
                    if (sum > 0) {
                        return true; }
                    return false;
                }, this);
            }
        });
    }
);

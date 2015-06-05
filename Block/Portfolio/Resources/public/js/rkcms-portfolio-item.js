/**
 * This file is part of the RedKite CMS Application and it is distributed
 * under the GPL LICENSE Version 2.0. To use this application you must leave
 * intact this copyright notice.
 *
 * Copyright (c) RedKite Labs <info@redkite-labs.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * For extra documentation and help please visit http://www.redkite-labs.com
 *
 * @license    GPL LICENSE Version 2.0
 *
 */

var PortfolioItem = function (params)
{
    var self = this;
    ExtendableCollection.call(self, params);
    self.hover_icon = ko.observable(self.block.hover_icon);
    self.title = ko.observable(self.block.title);
    self.subtitle = ko.observable(self.block.subtitle);
    self.modal_title = ko.observable(self.block.modal_title);
    self.modal_description = ko.observable(self.block.modal_description);
    self.modal_body = ko.observable(self.block.modal_body);
};

PortfolioItem.prototype = Object.create(ExtendableCollection.prototype);
PortfolioItem.prototype.constructor = PortfolioItem;

ko.components.register('rkcms-portfolio-item', {
    viewModel: PortfolioItem,
    template: { element: 'rkcms-portfolio-item-editor' }
});
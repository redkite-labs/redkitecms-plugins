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

var TimelineItem = function (params)
{
    var self = this;
    ExtendableCollection.call(self, params);
    self.year = ko.observable(self.block.year);
    self.subtitle = ko.observable(self.block.subtitle);
    self.body = ko.observable(self.block.body);
};

TimelineItem.prototype = Object.create(ExtendableCollection.prototype);
TimelineItem.prototype.constructor = TimelineItem;

ko.components.register('rkcms-timeline-item', {
    viewModel: TimelineItem,
    template: { element: 'rkcms-timeline-item-editor' }
});
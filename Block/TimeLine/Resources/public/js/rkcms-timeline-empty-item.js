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

var TimelineEmptyItem = function (params)
{
    var self = this;
    Extendable.call(self, params);
    self.year = ko.observable(self.block.year);
    self.subtitle = ko.observable(self.block.subtitle);
    self.body = ko.observable(self.block.body);
};

TimelineEmptyItem.prototype = Object.create(Extendable.prototype);
TimelineEmptyItem.prototype.constructor = TimelineEmptyItem;

ko.components.register('rkcms-timeline-empty-item', {
    viewModel: TimelineEmptyItem,
    template: { element: 'rkcms-timeline-empty-item-editor' }
});
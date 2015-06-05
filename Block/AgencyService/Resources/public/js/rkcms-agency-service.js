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

var AgencyService = function (params)
{
    var self = this;
    ExtendableCollection.call(self, params);
    self.service_title = ko.observable(self.block.service_title);
    self.service_description = ko.observable(self.block.service_description);
};

AgencyService.prototype = Object.create(ExtendableCollection.prototype);
AgencyService.prototype.constructor = AgencyService;

AgencyService.prototype.startBlockEditing = function()
{
    if (Block.prototype.startBlockEditing.call(this)) {
        return true;
    }

    $(".rkcms-ace-editor:visible").aceEditor('open', { width: '550px',  height: '350px' });
};

AgencyService.prototype.update = function(newValue, source)
{
    var self = this;
    ExtendableCollection.prototype.update(newValue, source, self);

    self.service_title(newValue.service_title);
    self.service_description(newValue.service_description);

    return true;
};

AgencyService.prototype.blockToJson = function()
{
    var self = this;
    var block = self.block;
    block.value = self.value();
    block.tags = self.tags();
    block.children = self.children();
    block.source = self.source;
    block.service_title = self.service_title();
    block.service_description = self.service_description();

    return ko.toJSON(block);
};

ko.components.register('rkcms-agency-service', {
    viewModel: AgencyService,
    template: { element: 'rkcms-agency-service-editor' }
});
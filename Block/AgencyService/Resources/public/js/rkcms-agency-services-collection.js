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

var AgencyServicesCollection = function (params)
{
    var self = this;
    ExtendableCollection.call(self, params);
};

AgencyServicesCollection.prototype = Object.create(ExtendableCollection.prototype);
AgencyServicesCollection.prototype.constructor = AgencyServicesCollection;

AgencyServicesCollection.prototype.startBlockEditing = function()
{
    if (Block.prototype.startBlockEditing.call(this)) {
        return true;
    }

    $(".rkcms-ace-editor:visible").aceEditor('open', { width: '550px',  height: '350px' });
};

ko.components.register('rkcms-agency-services-collection', {
    viewModel: AgencyServicesCollection,
    template: { element: 'rkcms-agency-services-collection-editor' }
});
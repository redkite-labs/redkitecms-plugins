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

var MemberTeam = function (params)
{
    var self = this;
    ExtendableCollection.call(self, params);
    self.member_name = ko.observable(self.block.member_name);
    self.member_role = ko.observable(self.block.member_role);
    self.toolbar.push("image-button");
};

MemberTeam.prototype = Object.create(ExtendableCollection.prototype);
MemberTeam.prototype.constructor = MemberTeam;

MemberTeam.prototype.startBlockEditing = function()
{
    if (Block.prototype.startBlockEditing.call(this)) {
        return true;
    }

    $(".rkcms-ace-editor:visible").aceEditor('open', { width: '550px',  height: '350px' });
};

MemberTeam.prototype.update = function(newValue, source)
{
    var self = this;
    ExtendableCollection.prototype.update(newValue, source, self);

    self.member_name(newValue.member_name);
    self.member_role(newValue.member_role);

    return true;
};

MemberTeam.prototype.blockToJson = function()
{
    var self = this;
    var block = self.block;
    block.value = self.value();
    block.tags = self.tags();
    block.children = self.children();
    block.source = self.source;
    block.member_name = self.member_name();
    block.member_role = self.member_role();

    return ko.toJSON(block);
};

ko.components.register('rkcms-member-team', {
    viewModel: MemberTeam,
    template: { element: 'rkcms-member-team-editor' }
});
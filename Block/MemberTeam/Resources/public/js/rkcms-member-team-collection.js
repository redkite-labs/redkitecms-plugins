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

var MemberTeamCollection = function (params)
{
    var self = this;
    ExtendableCollection.call(self, params);

    self.toolbar.push("image-button", "preview", "toggle-editor", "team-member-button");

};

MemberTeamCollection.prototype = Object.create(ExtendableCollection.prototype);
MemberTeamCollection.prototype.constructor = MemberTeamCollection;

MemberTeamCollection.prototype.startBlockEditing = function()
{
    if (Block.prototype.startBlockEditing.call(this)) {
        return true;
    }

    $(".rkcms-ace-editor:visible").aceEditor('open', { width: '550px',  height: '350px' });
};

BlockEditorModel.prototype.insertMemberTeam = function()
{
    var item = '  item' + (this.activeModel.children().length + 1) + ':\n' +
        '    children:\n' +
        '      item1:\n' +
        '        value: \'\'\n' +
        '        tags:\n' +
        '          src: /plugins/memberteam/images/team.jpg\n' +
        '          class: \'img-responsive img-circle\'\n' +
        '          title: \'\'\n' +
        '          alt: \'\'\n' +
        '        type: Image\n' +
        '      item2:\n' +
        '        children:\n' +
        '          item1:\n' +
        '            value: \'\'\n' +
        '            tags:\n' +
        '              class: \'fa fa-twitter\'\n' +
        '            type: Link\n' +
        '          item2:\n' +
        '            value: \'\'\n' +
        '            tags:\n' +
        '              class: \'fa fa-facebook\'\n' +
        '            type: Link\n' +
        '          item3:\n' +
        '            value: \'\'\n' +
        '            tags:\n' +
        '              class: \'fa fa-linkedin\'\n' +
        '            type: Link\n' +
        '        tags:\n' +
        '          class: \'list-inline social-buttons\'\n' +
        '        type: Menu\n' +
        '    tags:\n' +
        '      class: col-sm-4\n' +
        '    type: MemberTeam\n' +
        '    member_name: \'Jane Doe\'\n' +
        '    member_role: \'Lead Designer\'\n';
    this.activeModel.editor.insert(item);
};

ko.components.register('rkcms-member-team-collection', {
    viewModel: MemberTeamCollection,
    template: { element: 'rkcms-member-team-collection-editor' }
});
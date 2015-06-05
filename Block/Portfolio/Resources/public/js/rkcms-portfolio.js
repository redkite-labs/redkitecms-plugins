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

var Portfolio = function (params)
{
    var self = this;
    ExtendableCollection.call(self, params);

    self.toolbar.push("image-button", "preview", "toggle-editor", "portfolio-item-button");
    self.is_editing = ko.observable(false);
};

Portfolio.prototype = Object.create(ExtendableCollection.prototype);
Portfolio.prototype.constructor = Portfolio;

Portfolio.prototype.startBlockEditing = function()
{
    if (Block.prototype.startBlockEditing.call(this)) {
        return true;
    }

    $(".rkcms-ace-editor:visible").aceEditor('open', { width: '550px',  height: '400px' });
};

Portfolio.prototype.highlight = function()
{
    var self = this;
    self.is_editing(this.parent.active);

    Block.prototype.highlight.call(this);
};

Portfolio.prototype.hide = function()
{
    var self = this;
    self.is_editing(false);

    Block.prototype.hide.call(this);
};


ko.components.register('rkcms-portfolio', {
    viewModel: Portfolio,
    template: { element: 'rkcms-portfolio-editor' }
});

BlockEditorModel.prototype.insertPortfolioItem = function()
{
    var item = '  item' + (this.activeModel.children().length + 1) + ':\n' +
    '    children:\n' +
    '      item1:\n' +
    '        value: \'\'\n' +
    '        tags:\n' +
    '          src: /plugins/portfolio/images/portfolio-thumb.png\n' +
    '          class: img-responsive\n' +
    '          title: \'\'\n' +
    '          alt: \'\'\n' +
    '        href: \'\'\n' +
    '        type: Image\n' +
    '      item2:\n' +
    '        value: \'\'\n' +
    '        tags:\n' +
    '          src: /plugins/portfolio/images/portfolio.png\n' +
    '          data-src: \'\'\n' +
    '          class: img-responsive\n' +
    '          title: \'\'\n' +
    '          alt: \'\'\n' +
    '        href: \'\'\n' +
    '        type: Image\n' +
    '    tags:\n' +
    '      class: \'portfolio-item col-md-4 col-sm-6\'\n' +
    '    type: PortfolioItem\n' +
    '    hover_icon: \'fa fa-plus fa-3x\'\n' +
    '    title: Title\n' +
    '    subtitle: Subtitle\n' +
    '    modal_title: \'Project name\'\n' +
    '    modal_description: \'Lorem ipsum dolor sit amet consectetur.\'\n' +
    '    modal_body: \'Use this section to describe your project. You can add normal text as html text as well. Please note this text lives into a modal form, so you must click the item to check it\'\n';
    this.activeModel.editor.insert(item);
};
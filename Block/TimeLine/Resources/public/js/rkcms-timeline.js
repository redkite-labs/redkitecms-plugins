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

var Timeline = function (params)
{
    var self = this;
    ExtendableCollection.call(self, params);

    self.toolbar.push("image-button", "preview", "toggle-editor", 'timeline-item-button');
};

Timeline.prototype = Object.create(ExtendableCollection.prototype);
Timeline.prototype.constructor = Timeline;

Timeline.prototype.startBlockEditing = function()
{
    if (Block.prototype.startBlockEditing.call(this)) {
        return true;
    }

    $(".rkcms-ace-editor:visible").aceEditor('open', { width: '550px',  height: '400px' });
};

ko.components.register('rkcms-timeline', {
    viewModel: Timeline,
    template: { element: 'rkcms-timeline-editor' }
});

BlockEditorModel.prototype.insertTimelineItem = function()
{
    var timeline = '  item' + (this.activeModel.children().length + 1) + ':\n' +
    '    children:\n' +
    '      item1:\n' +
    '        value: \'\'\n' +
    '        tags:\n' +
    '          src: /plugins/timeline/images/timeline.jpg\n' +
    '          class: \'img-responsive img-circle\'\n' +
    '          title: \'\'\n' +
    '          alt: \'\'\n' +
    '        href: \'\'\n' +
    '        type: Image\n' +
    '    tags:\n' +
    '      class: timeline\n' +
    '    type: TimeLineItem\n' +
    '    year: 2009-2011\n' +
    '    subtitle: \'Our Humble Beginnings\'\n' +
    '    body: \'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!\'';

    this.activeModel.editor.insert(timeline);
};


BlockEditorModel.prototype.insertTimelineEmptyItem = function()
{
    var timeline = '  item' + (this.activeModel.children().length + 1) + ':\n' +
    '    value: \'\'\n' +
    '    tags: {  }\n' +
    '    type: TimeLineEmptyItem\n' +
    '    body: \'Be Part<br>Of Our<br>Story!\'';
    this.activeModel.editor.insert(timeline);
};


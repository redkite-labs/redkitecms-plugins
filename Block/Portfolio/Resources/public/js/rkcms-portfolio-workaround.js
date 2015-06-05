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

$(document).ready(function() {
    window.setTimeout(movePortfolioModals, 250);
});

function movePortfolioModals()
{
    jQuery('<div/>', {
        id: 'porfolio-modals'
    }).appendTo('body');

    var c = 0;
    $('.portfolio-item .portfolio-modal').each(function(){
        var $this = $(this);
        $this
            .appendTo('#porfolio-modals')
            .attr('id', 'portfolioModal' + c)
        ;
        c++;
    });
}
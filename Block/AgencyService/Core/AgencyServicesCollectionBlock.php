<?php
/**
 * This file is part of the RedKite CMS Application and it is distributed
 * under the MIT License. To use this application you must leave
 * intact this copyright notice.
 *
 * Copyright (c) RedKite Labs <webmaster@redkite-labs.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * For extra documentation and help please visit http://www.redkite-labs.com
 *
 * @license    MIT License
 *
 */

namespace RedKiteCms\Block\AgencyService\Core;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\Exclude;
use RedKiteCms\Block\Html\Core\HtmlBlock;
use RedKiteCms\Block\Icon\Core\IconBlock;
use RedKiteCms\Block\Image\Core\ImageBlock;
use RedKiteCms\Block\Link\Core\LinkBlock;
use RedKiteCms\Block\Menu\Core\MenuBlock;
use RedKiteCms\Block\Text\Core\TextBlock;
use RedKiteCms\Content\Block\ExtendableBlock;
use RedKiteCms\Content\Block\ExtendableCollectionBlock;

/**
 * Class AgencyServicesCollectionBlock is the object assigned to handle a collection of AgencyService objects
 *
 * @author  RedKite Labs <webmaster@redkite-labs.com>
 * @package RedKiteCms\Block\AgencyService\Core
 */
class AgencyServicesCollectionBlock extends ExtendableCollectionBlock
{
    /**
     * @Type("string")
     */
    protected $type = "AgencyServicesCollection";
    /**
     * @Type("string")
     */
    protected $customTag = "rkcms-agency-services-collection";

    /**
     * Contructor
     */
    public function __construct()
    {
        $children = array(
            new AgencyServiceBlock(),
            new AgencyServiceBlock(),
            new AgencyServiceBlock(),
        );

        parent::__construct($children);
    }
} 
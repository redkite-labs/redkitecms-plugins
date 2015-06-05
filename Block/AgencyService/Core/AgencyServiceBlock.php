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
use RedKiteCms\Block\IconStacked\Core\IconStackedBlock;
use RedKiteCms\Block\Image\Core\ImageBlock;
use RedKiteCms\Block\Link\Core\LinkBlock;
use RedKiteCms\Block\Menu\Core\MenuBlock;
use RedKiteCms\Block\Text\Core\TextBlock;
use RedKiteCms\Content\Block\ExtendableBlock;
use RedKiteCms\Content\Block\ExtendableCollectionBlock;

/**
 * Class AgencyServiceBlock is the object assigned to handle an agency service
 *
 * @author  RedKite Labs <webmaster@redkite-labs.com>
 * @package RedKiteCms\Block\AgencyService\Core
 */
class AgencyServiceBlock extends ExtendableCollectionBlock
{
    /**
     * @Type("string")
     */
    protected $type = "AgencyService";
    /**
     * @Type("string")
     */
    protected $customTag = "rkcms-agency-service";
    /**
     * @Type("string")
     */
    private $serviceTitle = "Service title";
    /**
     * @Type("string")
     */
    private $serviceDescription = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.";

    /**
     * Contructor
     */
    public function __construct()
    {
        $iconChildren = array(
            new IconBlock("", array('class' => "fa fa-circle fa-stack-2x text-primary")),
            new IconBlock("", array('class' => "fa fa-shopping-cart fa-stack-1x fa-inverse")),
        );

        $children = array(
            new IconStackedBlock($iconChildren, "", array(
                "class" => "fa-stack fa-4x",
            )),
        );

        $tags = array(
            "class" => "col-md-4",
        );

        parent::__construct($children, $tags);
    }

    protected function generateSourceFromChildren()
    {
        $source = parent::generateSourceFromChildren();
        $source["service_title"] = $this->serviceTitle;
        $source["service_description"] = $this->serviceDescription;

        return $source;
    }

    /**
     * @return mixed
     */
    public function getServiceTitle()
    {
        return $this->serviceTitle;
    }

    /**
     * @param mixed $serviceTitle
     */
    public function setServiceTitle($serviceTitle)
    {
        $this->serviceTitle = $serviceTitle;
    }

    /**
     * @return mixed
     */
    public function getServiceDescription()
    {
        return $this->serviceDescription;
    }

    /**
     * @param mixed $serviceDescription
     */
    public function setServiceDescription($serviceDescription)
    {
        $this->serviceDescription = $serviceDescription;
    }


} 
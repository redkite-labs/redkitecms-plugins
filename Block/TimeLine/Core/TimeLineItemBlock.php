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

namespace RedKiteCms\Block\TimeLine\Core;

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
 * Class TimeLineBlock is the object assigned to handle a time line object
 *
 * @author  RedKite Labs <webmaster@redkite-labs.com>
 * @package RedKiteCms\Block\TimeLine\Core
 */
class TimeLineItemBlock extends ExtendableCollectionBlock
{
    /**
     * @Type("string")
     */
    protected $type = "TimeLineItem";
    /**
     * @Type("string")
     */
    protected $customTag = "rkcms-timeline-item";
    /**
     * @Type("string")
     */
    private $year = "2009-2011";
    /**
     * @Type("string")
     */
    private $subtitle = "Our Humble Beginnings";
    /**
     * @Type("string")
     */
    private $body = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam";
    /**
     * @Exclude
     */
    protected $internal = true;
    /**
     * Constructor
     */
    public function __construct()
    {
        $imageTags = array(
            'src' => '/plugins/timeline/images/timeline.jpg',
            'class' => 'img-responsive img-circle',
            'title' => '',
            'alt' => '',
        );

        $children = array(
            new ImageBlock(null, $imageTags),
        );

        $tags = array(
            'class' => 'timeline',
        );

        parent::__construct($children, $tags);
    }

    protected function generateSourceFromChildren()
    {
        $source = parent::generateSourceFromChildren();
        $source["year"] = $this->year;
        $source["subtitle"] = $this->subtitle;
        $source["body"] = $this->body;

        return $source;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param mixed $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * @return mixed
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * @param mixed $subtitle
     */
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param mixed $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }
} 
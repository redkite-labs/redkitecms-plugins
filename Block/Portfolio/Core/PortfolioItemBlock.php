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

namespace RedKiteCms\Block\Portfolio\Core;

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
 * Class PortfolioItemBlock is the object assigned to handle an item object for a portfolio collection
 *
 * @author  RedKite Labs <webmaster@redkite-labs.com>
 * @package RedKiteCms\Block\Portfolio\Core
 */
class PortfolioItemBlock extends ExtendableCollectionBlock
{
    /**
     * @Type("string")
     */
    protected $type = "PortfolioItem";
    /**
     * @Type("string")
     */
    protected $customTag = "rkcms-portfolio-item";
    /**
     * @Type("string")
     */
    private $hoverIcon = "fa fa-plus fa-3x";
    /**
     * @Type("string")
     */
    private $title = "Title";
    /**
     * @Type("string")
     */
    private $subtitle = "Subtitle";
    /**
     * @Type("string")
     */
    private $modalTitle = "Project name";
    /**
     * @Type("string")
     */
    private $modalDescription = "Lorem ipsum dolor sit amet consectetur.";
    /**
     * @Type("string")
     */
    private $modalBody = 'Use this section to describe your project. You can add normal text as html text as well. Please note this text lives into a modal form, so you must click the item to check it';

    /**
     * @Exclude
     */
    protected $internal = true;

    /**
     * Constructor
     */
    public function __construct()
    {
        $thumbImageTags = array(
            'src' => '/plugins/portfolio/images/portfolio-thumb.png',
            'class' => 'img-responsive',
            'title' => '',
            'alt' => '',
        );

        $imageTags = array(
            'src' => '/plugins/portfolio/images/portfolio.png',
            'class' => 'img-responsive',
            'title' => '',
            'alt' => '',
        );

        $children = array(
            new ImageBlock(null, $thumbImageTags),
            new ImageBlock(null, $imageTags),
        );

        $tags = array(
            'class' => 'portfolio-item col-md-4 col-sm-6',
        );

        parent::__construct($children, $tags);
    }

    protected function generateSourceFromChildren()
    {
        $source = parent::generateSourceFromChildren();
        $source["hover_icon"] = $this->hoverIcon;
        $source["title"] = $this->title;
        $source["subtitle"] = $this->subtitle;
        $source["modal_title"] = $this->modalTitle;
        $source["modal_description"] = $this->modalDescription;
        $source["modal_body"] = $this->modalBody;

        return $source;
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
    public function getHoverIcon()
    {
        return $this->hoverIcon;
    }

    /**
     * @param mixed $hoverIcon
     */
    public function setHoverIcon($hoverIcon)
    {
        $this->hoverIcon = $hoverIcon;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getModalTitle()
    {
        return $this->modalTitle;
    }

    /**
     * @param mixed $modalTitle
     */
    public function setModalTitle($modalTitle)
    {
        $this->modalTitle = $modalTitle;
    }

    /**
     * @return mixed
     */
    public function getModalDescription()
    {
        return $this->modalDescription;
    }

    /**
     * @param mixed $modalDescription
     */
    public function setModalDescription($modalDescription)
    {
        $this->modalDescription = $modalDescription;
    }

    /**
     * @return mixed
     */
    public function getModalBody()
    {
        return $this->modalBody;
    }

    /**
     * @param mixed $modalBody
     */
    public function setModalBody($modalBody)
    {
        $this->modalBody = $modalBody;
    }
} 
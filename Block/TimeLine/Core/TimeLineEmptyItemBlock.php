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
use RedKiteCms\Content\Block\ExtendableBlock;
use Symfony\Component\Yaml\Yaml;

/**
 * Class TimeLineEmptyItemBlock is the object assigned to handle a timeline empty item
 *
 * @author  RedKite Labs <webmaster@redkite-labs.com>
 * @package RedKiteCms\Block\TimeLine\Core
 */
class TimeLineEmptyItemBlock extends ExtendableBlock
{
    /**
     * @Type("string")
     */
    protected $type = "TimeLineEmptyItem";
    /**
     * @Type("string")
     */
    protected $customTag = "rkcms-timeline-empty-item";
    /**
     * @Type("string")
     */
    private $body = 'Be Part<br>Of Our<br>Story!';

    /**
     * @Exclude
     */
    protected $internal = true;

    /**
     * Updates the block source
     */
    public function updateSource()
    {
        $source = array(
            "value" => $this->value,
            "tags" => $this->tags,
            "type" => $this->type,
            "body" => $this->body,
        );

        $this->source = Yaml::dump($source, 100, 2);
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
} 
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

namespace RedKiteCms\Block\MemberTeam\Core;

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
 * Class MemberTeamBlock is the object assigned to handle a member team block
 *
 * @author  RedKite Labs <webmaster@redkite-labs.com>
 * @package RedKiteCms\Block\MemberTeam\Core
 */
class MemberTeamBlock extends ExtendableCollectionBlock
{
    /**
     * @Type("string")
     */
    protected $type = "MemberTeam";
    /**
     * @Type("string")
     */
    protected $customTag = "rkcms-member-team";
    /**
     * @Type("string")
     */
    private $memberName = "Jane Doe";
    /**
     * @Type("string")
     */
    private $memberRole = "Lead Designer";

    /**
     * Contructor
     */
    public function __construct()
    {
        $imageTags = array(
            'src' => '/plugins/memberteam/images/team.jpg',
            'class' => 'img-responsive img-circle',
            'title' => '',
            'alt' => '',
        );

        $menuTags = array(
            'class' => "list-inline social-buttons",
        );

        $menuChildren = array(
            new LinkBlock('', array(
                'class' => 'fa fa-twitter',
            )),
            new LinkBlock('', array(
                'class' => 'fa fa-facebook',
            )),
            new LinkBlock('', array(
                'class' => 'fa fa-linkedin',
            )),
        );

        $children = array(
            new ImageBlock(null, $imageTags),
            new MenuBlock($menuChildren, $menuTags),
        );

        parent::__construct($children, array(
            'class' => 'col-sm-4'
        ));
    }

    protected function generateSourceFromChildren()
    {
        $source = parent::generateSourceFromChildren();
        $source["member_name"] = $this->memberName;
        $source["member_role"] = $this->memberRole;

        return $source;
    }

    /**
     * @return mixed
     */
    public function getMemberName()
    {
        return $this->memberName;
    }

    /**
     * @param mixed $memberName
     */
    public function setMemberName($memberName)
    {
        $this->memberName = $memberName;
    }

    /**
     * @return mixed
     */
    public function getMemberRole()
    {
        return $this->memberRole;
    }

    /**
     * @param mixed $memberRole
     */
    public function setMemberRole($memberRole)
    {
        $this->memberRole = $memberRole;
    }
} 
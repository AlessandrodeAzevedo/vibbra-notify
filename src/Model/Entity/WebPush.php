<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * WebPush Entity
 *
 * @property int $id
 * @property int $app_id
 * @property string $site_name
 * @property string $site_address
 * @property string $site_icon
 * @property string $text_message
 * @property string $text_button_allow
 * @property string $text_button_deny
 * @property string $notify_title
 * @property string $notify_message
 * @property string $notify_link_enable
 * @property string $notify_link
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property bool $status
 *
 * @property \App\Model\Entity\App $app
 */
class WebPush extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'app_id' => true,
        'site_name' => true,
        'site_address' => true,
        'site_icon' => true,
        'text_message' => true,
        'text_button_allow' => true,
        'text_button_deny' => true,
        'notify_title' => true,
        'notify_message' => true,
        'notify_link_enable' => true,
        'notify_link' => true,
        'created' => true,
        'modified' => true,
        'status' => true,
        'app' => true,
    ];
}

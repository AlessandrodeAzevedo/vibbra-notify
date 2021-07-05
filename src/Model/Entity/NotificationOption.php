<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * NotificationOption Entity
 *
 * @property int $id
 * @property int $notification_id
 * @property string $option_name
 * @property string $option_value
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Notification $notification
 */
class NotificationOption extends Entity
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
        'notification_id' => true,
        'option_name' => true,
        'option_value' => true,
        'created' => true,
        'modified' => true,
        'notification' => true,
    ];
}

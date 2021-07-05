<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Notification Entity
 *
 * @property int $id
 * @property int $app_id
 * @property \Cake\I18n\FrozenTime|null $sent_at
 * @property int $foreign_id
 * @property string $model
 * @property int $origin
 * @property \Cake\I18n\FrozenTime|null $read_id
 * @property string $content
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property bool $status
 *
 * @property \App\Model\Entity\App $app
 * @property \App\Model\Entity\Foreign $foreign
 * @property \App\Model\Entity\Read $read
 */
class Notification extends Entity
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
        'sent_at' => true,
        'foreign_id' => true,
        'model' => true,
        'origin' => true,
        'read_at' => true,
        'content' => true,
        'created' => true,
        'modified' => true,
        'status' => true,
        'app' => true,
        'email' => true,
        'read' => true,
    ];
}

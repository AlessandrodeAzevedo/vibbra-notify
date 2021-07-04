<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Email Entity
 *
 * @property int $id
 * @property int $app_id
 * @property string $server_name
 * @property string $port
 * @property string $login
 * @property string $password
 * @property string $sender_name
 * @property string $sender_email
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property bool $status
 *
 * @property \App\Model\Entity\App $app
 */
class Email extends Entity
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
        'server_name' => true,
        'port' => true,
        'login' => true,
        'password' => true,
        'sender_name' => true,
        'sender_email' => true,
        'created' => true,
        'modified' => true,
        'status' => true,
        'app' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
    ];
}

<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * App Entity
 *
 * @property int $id
 * @property string $name
 * @property int $user_id
 * @property bool $enable_webpush
 * @property bool $enable_email
 * @property bool $enable_sms
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property bool $status
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Email[] $emails
 * @property \App\Model\Entity\Sms[] $smss
 * @property \App\Model\Entity\WebPush[] $web_pushes
 */
class App extends Entity
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
        'name' => true,
        'user_id' => true,
        'enable_webpush' => true,
        'enable_email' => true,
        'enable_sms' => true,
        'created' => true,
        'modified' => true,
        'status' => true,
        'user' => true,
        'emails' => true,
        'smss' => true,
        'web_pushes' => true,
    ];
}

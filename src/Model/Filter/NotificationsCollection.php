<?php
declare(strict_types=1);

namespace App\Model\Filter;

use Search\Model\Filter\FilterCollection;
use Cake\Chronos\Chronos;

class NotificationsCollection extends FilterCollection
{
    public function initialize(): void
    {
        $this->value('origin');
        $this->add('begin_date', 'Search.Callback', [
            'callback' => function ($query, $args, $filter) {
                $output = preg_replace( '/[^0-9]/', '', $args['begin_date'] );
                if (!empty($output) && is_numeric($output)){
                    $query->where([
                        'Notifications.sent_at >=' => Chronos::createFromFormat('d/m/Y', $args['begin_date'])->format('Y-m-d') . " 23:59:59"
                    ]);
                }
            }
        ]);
        $this->add('end_date', 'Search.Callback', [
            'callback' => function ($query, $args, $filter) {
                $output = preg_replace( '/[^0-9]/', '', $args['end_date'] );
                if (!empty($output) && is_numeric($output)){
                    $query->where([
                        'Notifications.sent_at <=' => Chronos::createFromFormat('d/m/Y', $args['end_date'])->format('Y-m-d') . " 00:00:00"
                    ]);
                }
            }
        ]);
    }
}
<?php
declare(strict_types=1);

namespace App\Model\Filter;

use Search\Model\Filter\FilterCollection;

class NotificationsCollection extends FilterCollection
{
    public function initialize(): void
    {
        $this->value('origin');
        $this->add('name', 'Search.Callback', [
            'callback' => function ($query, $args, $filter) {
                dd($query);
            }
        ]);
        
        //->value('periods')
        //->value('origin')
        //->value('channel');
    }

    /* public function process()
    {
        //dd($this->getQuery());
        
        
        // return false if you want to skip modifying the query based on some condition.

        // Use $this->getQuery() to get query instance and modify it as needed.

        return true;
    } */
}
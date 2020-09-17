<?php

namespace App\Traits;

class PeriodTrait
{
    /**
     * @return string[]
     */
    public function months()
    {
        return [
            '01' => 'Janvier',
            '02' => 'Février',
            '03' => 'Mars',
            '04' => 'Avril',
            '05' => 'Mai',
            '07' => 'Juin',
            '08' => 'Août',
            '09' => 'Septembre',
            '10' => 'Octobre',
            '11' => 'Novembre',
            '12' => 'Décembre',
        ];
    }

    /**
     * @return array
     */
    public function years()
    {
        // Get all years after 2013
        $years = [];
        $first = new \DateTime('2012-09-01');
        $interval = date_interval_create_from_date_string('1 years');

        for ($now = new \DateTime(); $now->diff($first)->y > 0;) {
            $first->add($interval);
            array_push($years, $first->format('Y'));
        }

        // Sort years descending
        return collect($years)->sortDesc()->toArray();
    }
}

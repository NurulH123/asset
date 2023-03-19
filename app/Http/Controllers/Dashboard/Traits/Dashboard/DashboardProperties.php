<?php
namespace App\Http\Controllers\Dashboard\Traits\Dashboard;

/**
 *
 */
trait DashboardProperties
{
    protected function random_color_part() {
        return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
    }

    protected function random_color() {
        return $this->random_color_part() . $this->random_color_part() . $this->random_color_part();
    }
}


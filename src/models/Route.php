<?php namespace Salaback\LiquidCMS;

use Illuminate\Database\Eloquent\Model;

class Route extends Model {

    public function Page()
    {
        return $this->hasOne('Salaback\LiquidCMS\Page');
    }

}

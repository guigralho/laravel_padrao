<?php

namespace BeBack\Models;

use BeBack\Observers\DeleteObserver;
use BeBack\Observers\MenuObserver;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Menu
 * @package BeBack\Models
 */
class Menu extends Model
{

    /**
     *
     */
    public static function boot() {
        parent::boot();

        self::observe(new MenuObserver);
        self::observe(new DeleteObserver());
    }

    /**
     * @return mixed
     */
    public function subMenu()
    {
    	return $this->hasMany(Menu::class);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeWithoutParentId($query)
	{
		return $query->where('menu_id', null);
	}

    /**
     * @param $query
     * @return mixed
     */
    public function scopeOrderMenu($query)
	{
		return $query->orderBy('order');
	}

}
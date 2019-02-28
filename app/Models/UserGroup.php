<?php

namespace BeBack\Models;

use BeBack\Observers\DeleteObserver;
use BeBack\Observers\UserGroupObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use BeBack\Constants\UserStatusConstant;

/**
 * Class UserGroup
 * @package BeBack\Models
 */
class UserGroup extends Model
{
    use SoftDeletes;

    public static function boot() {
        parent::boot();
        self::observe(new UserGroupObserver());
        self::observe(new DeleteObserver());
    }

    /**
     * @return string
     */
    public function label()
    {
        switch ($this->status) {
            case UserStatusConstant::ACTIVE:
                return 'label label-success';
            break;

            case UserStatusConstant::INACTIVE:
                return 'label label-warning';
            break;
            
            default:
                return 'label label-success';
            break;
        }
    }
}

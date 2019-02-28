<?php

namespace BeBack\Models;

use Spatie\Permission\Traits\HasRoles;

use BeBack\Observers\DeleteObserver;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use BeBack\Constants\UserStatusConstant;
use BeBack\Services\UserService;
use Mail;
use Storage;

/**
 * Class User
 * @package BeBack\Models
 */
class User extends Authenticatable
{
    use Notifiable, SoftDeletes, HasRoles;

    const CUSTOMER_IMAGES = 'customer_images';

    public static function boot() {
        parent::boot();
        self::observe(new DeleteObserver());
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'user_group_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group()
    {
        return $this->belongsTo(UserGroup::class, 'user_group_id', 'id');
    }

    /**
     * @param string $token
     */
    public function sendPasswordResetNotification($token)
    {
        app(UserService::class)->sendResetPasswordEmail($this, $token);
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
<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use mysql_xdevapi\ExecutionStatus;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name', 'email', 'password', 'office', 'designation', 'status','contact'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];


    public static function districts(): array
    {
        return [
            'Muzaffarabad',
            'Neelum',
            'Hattian',
            'Poonch',
            'Mirpur',
            'Bagh',
            'Bhimber',
            'Sudhanoti',
            'Kotli',
            'Haveli',
        ];
    }

    public static function office(): array
    {
        return [
            'Muzaffarabad',
            'Garhi Dupatta',
            'Jhelum Valley',
            'Athmuqam',
            'Bagh',
            'Rawalakot',
            'Hajira',
            'Pallandri',
            'Kahutta/Havali',
            'Abbaspur',
            'Store Division Muzaffarabad',
            'Chief Engineer Electricity',
        ];
    }

    public static function office_urdu(): array
    {
        return [
            'مظفرآباد',
            'گڑھی دوپٹہ',
            'جہلم ویلی',
            'آٹھمقام',
            'باغ',
            'راولاکوٹ',
            'ہجیرہ',
            'پلندری',
            'کہوٹہ/حویلی',
            'عباسپور',
            'سٹور دویژن مظفرآباد',
            'چیف انجینئر برقیات',
        ];
    }
}

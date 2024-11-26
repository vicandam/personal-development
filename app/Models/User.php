<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function scheduledEmails()
    {
        return $this->hasMany(ScheduledEmail::class);
    }

    public function getTimezone(): string
    {
        return $this->timezone ?? config('app.timezone');
    }

    public function getScheduledTime(): string
    {
        return $this->scheduledEmails->first()->scheduled_time ?? '08:00:00'; // Default scheduled time
    }

    public function wantsDailyMotivationEmail(): bool
    {
        return $this->receive_motivation_email === true;
    }

    public function isAdmin()
    {
        return $this->type == 2;
    }

    public function settings()
    {
        return $this->hasOne(Settings::class);
    }

    public function getSidebarSkinAttribute()
    {
        if ($this->hasRole('admin')) {
            $settings = $this->settings;

            if ($settings && isset($settings->sidebar_skin)) {
                return $settings->sidebar_skin;
            }
        }

        return ''; // Default value when not an admin or when sidebar_skin is not set
    }

    public function getHeaderSkinAttribute()
    {
        if ($this->hasRole('admin')) {
            $settings = $this->settings;

            if ($settings && isset($settings->header_skin)) {
                return $settings->header_skin;
            }
        }

        return ''; // Default value when not an admin or when sidebar_skin is not set
    }
    public function getRoleAttribute()
    {
        return $this->hasRole('admin') ? 'admin':'user';
    }
    public function aiInstructions()
    {
        return $this->hasMany(AiInstruction::class);
    }
}

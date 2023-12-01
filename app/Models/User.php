<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'avatar',
        'dob',
        'gender',
        'address',
        'id_status',
        'id_role'
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

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomPassword($token));
    }

    public function userStatus()
    {
        return $this->belongsTo(UserStatus::class, 'id_status');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role');
    }

    public function order()
    {
        return $this->hasMany(Order::class, 'user_id');
    }
}

class CustomPassword extends ResetPassword
{
    public function toMail($notifiable)
    {
        session()->flash('success', 'Đã gửi link khôi phục vào mail của bạn.');

        $passwordExpireTime = config('auth.passwords.' . config('auth.defaults.passwords') . '.expire');
        $actionUrl = url(config('app.url') . route('password.reset', $this->token, false));

        return (new MailMessage)
            ->subject('Khôi phục mật khẩu')
            ->greeting('Xin chào ' . $notifiable->name . '!')
            ->line('Bạn đã quên mật khẩu!')
            ->action('Đặt lại mật khẩu', $actionUrl)
            ->line('Liên kết này sẽ hết hạn sau ' . $passwordExpireTime . ' phút.')
            ->line('Nếu bạn không yêu cầu đặt lại mật khẩu thì vui lòng không bấm vào liên kết này!');
    }
}

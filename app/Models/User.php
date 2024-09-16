<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // テーブル名を指定
    protected $table = 's001_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'role_id',
        'password',
        'is_disable',
        'is_delete',
        'created_by',
        'updated_by'
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * ハッシュ化されたパスワードを生成
     * @param mixed $password
     * @return string
     */
    public static function generatePassword($password)
    {
        return Hash::make($password);
    }

    /**
     * ユーザー認証
     * @param mixed $name
     * @param mixed $password
     * @return User|null
     */
    public static function authenticate($name, $password)
    {
        $user = self::where('name', $name)->first();

        if ($user && Hash::check($password, $user->password)) {
            return $user; // 認証成功
        }

        return null; // 認証失敗
    }

}

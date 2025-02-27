<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Attributes\ObservedBy; // * ObservedBy ekledik.
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable; // * Notifiable ekledik.
use App\Observers\UserObserver;     // * UserObserver ekledik.
use Spatie\Permission\Traits\HasRoles; // * HasRoles ekledik.

#[ObservedBy(UserObserver::class)] // * UserObserver sınıfını bağladık.
class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    /**
     * ? Fillable ne işe yarar?
     * * Fillable, modelin hangi alanların doldurulabileceğini belirlemek için kullanılır.
     * * Yani, bu alanlar dışında bir alan doldurulmaya çalışıldığında hata alınır.
     * * Örneğin, bir kullanıcı kaydı oluşturulurken, sadece name, email ve password alanları doldurulabilir.
     */
    protected $fillable = [ // $fillable kullanımı
        'name',
        'email',
        'password',
        'email_verified_at',
    ];

    // protected $guarded = ['created_at']; // * created_at alanı dışında tüm alanları koru.  // * $guarded kullanımı

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
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
    /**
    * ? Cast ne işe yarar?
    * * Cast, modelin belirli alanlarının belirli veri türlerine dönüştürülmesini sağlar.
    * * Örneğin, bir tarih alanını datetime veri türüne dönüştürmek için cast kullanabilirsiniz.
    */
    protected function casts(): array // casts kullanımı
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}

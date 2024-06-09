<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','nama_lengkap','nomor_telepon','jumlah_orang','tanggal','total_harga','status'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

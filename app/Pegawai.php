<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'slidefotoatas';
    protected $fillable = ['nama_depan', 'nama_belakang', 'jenis_kelamin', 'agama', 'alamat', 'avatar', 'user_id'];

    public function getAvatar()
    {
        if (!$this->avatar) {
            return asset('image/default.png');
        }

        return asset('image/' . $this->avatar);
    }

    public function inventaris()
    {
        return $this->belongsToMany(Inventaris::class)->withPivot(['harga']);
    }
}

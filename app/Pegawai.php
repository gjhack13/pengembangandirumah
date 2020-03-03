<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'slidefotoatas';
    protected $fillable = ['judul_image1', 'image1', 'judul_image2', 'image2', 'judul_image3', 'image3'];

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

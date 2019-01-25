<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageModel extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'images';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['type', 'category_id', 'ref_id', 'file_path', 'thumb_file_path', 'status', 'order'];

    public static function getLogo()
    {
        $logo = self::where(['type' => 'logo', 'category_id' => 0, 'order' => 0])->first();

        return isset($logo->file_path) ? $logo->file_path : '';
    }

}

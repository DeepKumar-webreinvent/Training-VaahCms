<?php namespace VaahCms\Modules\Blog\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogImages extends Model
{
    use SoftDeletes;
    //-------------------------------------------------
    protected $table = 'blog_images';
    //-------------------------------------------------
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    //-------------------------------------------------
    protected $fillable = [
        'blog_id',
        'image_name',
    ];


    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }

}

<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

class News extends Model implements Feedable
{
    use HasFactory;
    // public $timestamps = true;
    protected $guarded = [];

    public function toFeedItem():FeedItem
    {
        return FeedItem::create()
            ->id($this->id)
            ->title($this->titulo)
            ->summary($this->descrip)
            ->updated($this->updated_at)
            ->link('noticias/'.$this->id)
            ->author($this->author);
    }

    public static function getFeedItems()
    {
        return News::all();
    }

    public function stars()
    {
        return $this->hasMany(Stars::class);
    }

    public static function promedio()
    {
        // return $this->
    }
}

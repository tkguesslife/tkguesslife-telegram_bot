<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

/**
 * Class UserBotConfig
 * @package App
 * @author Tiko Banyini
 */
class UserBotConfig extends Model
{
    protected $fillable = ['bot_token', 'default_currency','webhook_url'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function User(){
        return $this->belongsTo('App\User');
    }

}
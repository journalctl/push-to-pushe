<?php

namespace Journalctl\PushToPushe;

use Illuminate\Database\Eloquent\Model;

/**
 * Class FirebaseChannel
 *
 * @package Yusef\Channels
 */
class PushToPushe extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'push_to_pushe_ids';
    /**
     * The guarded attributes on the model.
     *
     * @var array
     */
    protected $guarded = [];
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * Get the user that the pushe id belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(config('push-to-pushe.user_model'));
    }
}
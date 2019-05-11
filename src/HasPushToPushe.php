<?php

namespace Journalctl\PushToPushe;


trait HasPushToPushe
{
    /**
     * Get all of the user's registered pushe ids.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pusheIds()
    {
        return $this->hasMany(PushToPushe::class, 'user_id');
    }

    /**
     * Send push notification to user.
     *
     * @param string $title
     * @param string $content
     * @param array $appIds
     * @return bool
     */
    public function pushToPushe(string $title, string $content, array $appIds = [])
    {
        $pusheIds = $this->pusheIds()->latest()->pluck('pushe_id');

        $data = ['title' => $title, 'content' => $content];

        return PushToPusheClient::sendNotification($pusheIds, $data, $appIds);
    }
}

<?php

namespace Journalctl\PushToPushe\Http\Controllers;

use Illuminate\Http\Request;
use Journalctl\PushToPushe\PushToPushe;

class RegisterController
{
    public function register(Request $request)
    {
        $pusheId = $request->input('pushe_id');

        if (!$pusheId) {
            return response(['status' => 'failed', 'message' => 'Bad request.'], 400);
        }

        $pushe = PushToPushe::where('pushe_id', $pusheId)->first();

        if (!$pushe) {
            $pushe = new PushToPushe([
                'pushe_id' => $pusheId,
            ]);
        }

        $pushe->user_id = auth()->id() ?? null;

        $pushe->save();

        return ['status' => 'success'];

    }
}

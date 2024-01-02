<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Conversation;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ParticipantRequest;

class ConversationsController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return $user->conversations()->paginate();
    }

    public function show(Conversation $conversation)
    {
        return $conversation->load('participants');
    }

    public function addParticipant(ParticipantRequest $request, Conversation $conversation)
    {
        $conversation->participants()->attach($request->validated(), [
            'joined_at' => Carbon::now(),
        ]);
    }

    public function removeParticipant(ParticipantRequest $request, Conversation $conversation)
    {
        $conversation->participants()->detach($request->validated());
    }
}

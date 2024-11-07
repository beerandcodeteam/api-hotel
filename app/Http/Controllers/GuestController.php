<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuestStoreRequest;
use App\Http\Requests\GuestUpdateRequest;
use App\Models\Guest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $guests = Guest::query();

        if ($request->has('name')) {
            $guests->where('name', 'like', '%' . $request->get('name') . '%');
        }

        if ($request->has('is_foreigner')) {
            $guests->where('is_foreigner', $request->get('is_foreigner'));
        }

        return $guests->paginate();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GuestStoreRequest $request)
    {
        $guest = DB::transaction(function () use ($request) {
            $user = User::create($request->validated());
            $user->guest()->create($request->validated());

            return $user->load('guest');
        });

        return $guest;
    }

    /**
     * Display the specified resource.
     */
    public function show(Guest $guest)
    {
        return $guest->load(['user', 'addresses']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GuestUpdateRequest $request, Guest $guest)
    {
        $guest = DB::transaction(function () use ($request, $guest) {
            $guest->update($request->validated());
            $guest->user->update($request->validated());

            return $guest;
        });

        return $guest;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = auth()->user();
        $user->guest()->delete();
        $user->delete();

        return response()->noContent();
    }
}

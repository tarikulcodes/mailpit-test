<?php

namespace App\Http\Controllers;

use App\Notifications\TestEmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Inertia\Inertia;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('home', [
            'success' => session('success'),
            'error' => session('error'),
        ]);
    }

    public function sentMail()
    {
        try {
            Notification::route('mail', 'test@test.com')->notify(new TestEmailNotification());
        } catch (\Exception $e) {
            return to_route('home')->with('error', $e->getMessage());
        }

        return to_route('home')->with('success', 'Email sent successfully');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

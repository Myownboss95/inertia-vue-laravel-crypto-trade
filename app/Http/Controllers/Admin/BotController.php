<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bot;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bots = Bot::latest()->paginate();
        return inertia('admin.bots.index', [
            'bots' => $bots
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return inertia('admin.bots.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            'name' => ['required', 'string', 'unique:bots'],
            // 'description' => ['required', 'string'],
            'profit_percentage' => ['required', 'numeric'],
            'loss_percentage' => ['required', 'numeric'],
            'trades_per_day' => ['required', 'numeric']
        ]);

        Bot::create($valid);
        session()->flash('succes', 'Bot created successfully');
        return redirect()->route('admin.bots.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bot  $bot
     * @return \Illuminate\Http\Response
     */
    public function show(Bot $bot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bot  $bot
     * @return \Illuminate\Http\Response
     */
    public function edit(Bot $bot)
    {
        return inertia('admin.bots.edit', [
            'bot' => $bot
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bot  $bot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bot $bot)
    {
        $valid = $request->validate([
            'name' => ['required', 'string', Rule::unique('bots')->ignore($bot)],
            // 'description' => ['required', 'string'],
            'profit_percentage' => ['required', 'numeric'],
            'loss_percentage' => ['required', 'numeric'],
            'trades_per_day' => ['required', 'numeric']
        ]);

        $bot->update($valid);
        session()->flash('success', 'Bot updated successfully');
        return redirect()->route('admin.bots.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bot  $bot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bot $bot)
    {
        $bot->delete();
        return redirect()->route('admin.bots.index');
    }
}

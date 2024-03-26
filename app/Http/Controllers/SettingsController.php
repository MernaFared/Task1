<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function update(Request $request, $key)
    {
        $request->validate([
            'value' => 'required|string',
        ]);

        $setting = Settings::updateOrCreate(['key' => $key], ['value' => $request->value]);

        return response()->json(['message' => 'Setting updated successfully', 'setting' => $setting]);
    }

    public function get($key)
    {
        $setting = Settings::where('key', $key)->first();

        return response()->json(['setting' => $setting]);
    }
}

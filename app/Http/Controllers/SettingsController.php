<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use App\Models\User;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function changeTheme(Request $request)
    {
        $userId = auth()->id();
        $data = [];

        if ($request->has('sidebar')) {
            $data['sidebar_skin'] = $request->input('sidebar');
        } elseif ($request->has('header')) {
            $data['header_skin'] = $request->input('header');
        }

        Settings::updateOrCreate(['user_id' => $userId], $data);

        return response()->json($request->all(), 200);
    }

    public function motivationRandomizer(Request $request)
    {
        $userId = auth()->id();
        $isChecked = $request->input('isChecked');

        // Update the 'random_motivation' column in the database
        Settings::updateOrCreate(['user_id' => $userId], ['random_motivation' => $isChecked]);

        return response()->json(['message' => 'Switch state updated successfully']);
    }
}

<?php

namespace App\Http\Controllers;

class RoleSwitchController extends Controller
{
    public function switchRole($role)
    {
        // Check if the currently authenticated user has the admin role
        if (auth()->user()->isAdmin()) {

            // Switch the user's role to the specified role
            auth()->user()->syncRoles([$role]);

            return redirect()->route('user.index');
        }

        // Handle unauthorized access (e.g., show an error message)
        abort(403);
    }
}

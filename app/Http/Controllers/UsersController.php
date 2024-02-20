<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UsersController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id);

        return Inertia::render('Profile/Partials/CreateOwnerForm', [
            'user' => $user,
        ]);
    }
}

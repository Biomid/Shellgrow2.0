<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Inertia\Inertia;

class AdminAgentCreateController extends Controller
{
    public function create()
    {
        //return Inertia::render('Profile/Partials/CreateOwnerForm');


        return Inertia::render('Profile/Partials/CreateAgentForm');
    }
    public function createAgent(Request $request)
    {
        // Валидация входных данных
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string',
            'file' => 'file',
        ]);

        // Создание нового пользователя


        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make(Str::random(8));

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            if ($file->store('uploads/photo')) {
                $user->file_path = $filename;
            } else {
                return redirect()->back()->with('error', 'File upload failed');
            }
        }
        $user->save();
        //Mail::to($request->email)->send(new PasswordMail($request->password));
        // Присвоение роли пользователю
        $role = 'agent';
        $user->assignRole($role);

        //$agent = new Agent();

        return redirect()->route('agents')->with('success', 'User created successfully');
    }
}

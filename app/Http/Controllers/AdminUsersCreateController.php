<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\Apartment;
use App\Models\Owner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Spatie\Permission\Models\Role;

class AdminUsersCreateController extends Controller
{
    public function createUser(Request $request)
    {
        // Валидация входных данных
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string',
            'file' => 'file',
            'dob' => 'required|date_format:Y-m-d'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make(Str::random(8));
        $user->phone = $request->phone;
        $user->dob = \Carbon\Carbon::createFromFormat('Y-m-d', $request->dob);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            if ($file->store('uploads/documents')) {
                $user->file_path = $filename;
            } else {
                return redirect()->back()->with('error', 'File upload failed');
            }
        }
        $user->save();

        // Присвоение роли пользователю
        //$role = Role::where('name', $request->role)->first();
        $user->assignRole('owner');

        $owner = new Owner();
        $owner->user_id = $user->id;
        $owner->name = $request->name;
        $owner->save();

        // Redirect to the /users/create route
        return redirect()->route('users')->with('success', 'User created successfully');
        //return redirect()->back();
    }
    public function ShowUsers()
    {
        $roleId = 3; // Replace with the actual ID of the role you want to filter

        $users = User::whereHas('roles', function ($query) use ($roleId) {
            $query->where('id', $roleId);
        })->orderBy('id')->get();

        return response()->json($users);
    }

    public function ShowAgents()
    {
        $roleId = 2; // Replace with the actual ID of the role you want to filter

        $agents = User::whereHas('roles', function ($query) use ($roleId) {
            $query->where('id', $roleId);
        })->orderBy('id')->get();

        return response()->json($agents);
    }

    public function ShowApartments()
    {
        $apartments = Apartment::with('owner')->get();

        return response()->json($apartments);
    }

    public function create()
    {
        //return Inertia::render('Profile/Partials/CreateOwnerForm');

        $user = new User();

        return Inertia::render('Profile/Partials/CreateOwnerForm', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified user in storage.
     *
     * @param  UpdateUserRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateUser(UpdateUserRequest $request, $id)
    {

        // Находим пользователя по ID
        $user = User::findOrFail($id);

        // Обновляем данные пользователя
        $user->name = $request->name;
        $user->dob = $request->dob;
        $user->phone = $request->phone;
        $user->email = $request->email;

        // Проверяем, был ли предоставлен новый файл удостоверяющий личность
        if ($request->hasFile('file')) {
            // Обрабатываем загрузку файла удостоверяющего личность
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            // Сохраняем файл удостоверяющий личность в хранилище
            if ($file->store('uploads/documents')) {
                $user->file_path = $filename;
            }
        }

        // Сохраняем изменения пользователя
        $user->save();

        // Возвращаем ответ с сообщением об успешном обновлении
        return redirect()->back()->with('success', 'User updated successfully');
    }
}

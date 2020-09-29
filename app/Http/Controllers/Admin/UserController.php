<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{

    /**
     * Displays the resource view
     *
     * @return void
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Displays the resource view
     *
     * @return void
     */
    public function create()
    {
        $roles = UserRole::all();
        $organisations = Organisation::all();
        return view('admin.users.create', compact('roles', 'organisations'));
    }

    /**
     * Stores the resource
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:255',
            'email' => 'required|string|email|unique:users',
            'role_id' => 'required|integer|exists:user_roles,id',
            'organisations' => 'nullable|array',
            'organisations.*' => 'integer|exists:organisations,id',
        ]);

        $generatedPassword = Str::random(12);
        $data['password'] = Hash::make($generatedPassword);

        $user = User::create($data);

        $organisations = $data['organisations'] ?? null;
        $user->organisations()->sync($organisations);

        Mail::to($user)->send(new UserCreated($user, $generatedPassword));

        return redirect("/dashboard/gebruikers/$user->id")->with('success', 'Gebruiker is aangemaakt én de logingegevens zijn verstuurd.');
    }


}

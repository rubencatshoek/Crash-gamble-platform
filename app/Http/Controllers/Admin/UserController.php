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
    public function index(Request $request)
    {
        $users = User::all();

        //Validate incomming data
        $data = $request->validate([
            //Let incoming data be nullable so
            'user_id' => ['nullable', 'exists:users,id'],
        ]);

        // Grab all articles sorted by publication date.
//        $users = Article::latest()->paginate(8);

        // Create a new query to search for specific articles.
        $query = (new User())->newQuery();

        // Grab all articles where given "article_id" in the request matches "id" on the articles table
        if (isset($data['user_id'])) {
            $query->where('id', '=', $data['user_id']);
        }

        // Grab all articles where given "created_at" in the request matches "created_at" on the articles table
//        if (isset($data['created_at'])) {
//            $query->where('created_at', '=', $data['created_at']);
//        }

        // Sort all filtered articles by publication date.
        $filteredUsers = $query->latest()->get();

        // Return all gathered data to the admin users index.
        return view('admin.users.index', compact('users', 'filteredUsers'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
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

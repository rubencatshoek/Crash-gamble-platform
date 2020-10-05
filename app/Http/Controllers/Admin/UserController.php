<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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
    public function update(Request $request, User $user)
    {
        //stores the updates user data

        if (Auth::user()->role_id !== 2) {
            return;
        }


        $data = $request->only('name', 'role_id');

        $validator = Validator::make($data, [
            'name' => [
                'required',
                Rule::unique('users')->ignore($user->id),
                'max:15'
            ],
            'role_id' => [
                'required',
                'exists:user_roles,id'
            ]
        ]);

        if ($validator->fails()) {
            return redirect::back()
                ->withErrors($validator)
                ->withInput();
        }

        $user->update($data);

        return redirect()->back()->with('success', 'User succesfully edited');
    }

}

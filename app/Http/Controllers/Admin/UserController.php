<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\UserStatus;
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateStatus(Request $request)
    {
        $data = $request->only('id', 'action');
        $user = User::find($data['id']);
        $authUser = auth()->user();
        $admin = 3;

        if ($authUser->role_id !== $admin) {
            return redirect()->back()->with('error', 'Something went wrong.');
        }

        if ($authUser->role_id <= $user->role_id) {
            return redirect()->back()->with('error', 'Something went wrong.');
        }

        $validator = Validator::make($data, [
            'id' => [
                'required',
                'exists:users,id'
            ],
            'action' => [
                'required',
            ]
        ]);

        if ($validator->fails()) {
            return redirect::back()
                ->withErrors($validator)
                ->withInput();
        }

        $status_id = null;
        $action = '';

        switch ($request['action']) {
            case 'flag':
                $status_id = 3;
                $action = 'flagged';
                break;
            case 'mute':
                $status_id = 2;
                $action = 'muted';
                break;
            case 'ban':
                $status_id = 1;
                $action = 'banned';
                break;
            default:
                return redirect()->back()->with('error', 'Something went wrong.');
        }

        UserStatus::create([
            'status_id' => $status_id,
            'user_id' => $user->id
        ]);

        return redirect()->back()->with('success', 'user: "' . $user->name . '" was successfully ' . $action);
    }

    /**
     * Stores the resource
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, User $user)
    {
        $authUser = auth()->user();
        $admin = 3;

        if ($authUser->role_id !== $admin) {
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

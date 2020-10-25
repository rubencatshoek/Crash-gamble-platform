<?php

namespace App\Http\Controllers\Admin;

use App\Models\Status;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\UserStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $usersAll = User::all();
        $statuses = Status::all();
        $filteredUsers = (new User())->newQuery()->select('users.*');

        //Validate incoming data
        $data = $request->validate([
            'user_id' => ['nullable', 'exists:users,id'],
            'status_id' => ['nullable', 'exists:statuses,id'],
        ]);

        if (isset($data['user_id']) || isset($data['status_id'])) {
            if (isset($data['user_id'])) {
                $filteredUsers->where('users.id', '=', $data['user_id']);
            }
            if (isset($data['status_id'])) {
                $filteredUsers->join('user_statuses', 'users.id', '=', 'user_statuses.user_id')
                ->where('user_statuses.status_id', '=', $data['status_id']);
            }
            $users = $filteredUsers->get()->all();
        }

        // Return all gathered data to the admin users index.
        return view('admin.users.index', compact('users', 'statuses', 'usersAll'));
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
            case 'unflag':
                $status_id = 3;
                $action = 'unflagged';
                break;
            case 'unmute':
                $status_id = 2;
                $action = 'unmuted';
                break;
            case 'unban':
                $status_id = 1;
                $action = 'unbanned';
                break;
            default:
                return redirect()->back()->with('error', 'Something went wrong.');
        }

        $status = null;

        if ($data['action'] === 'unban' || $data['action'] === 'unflag' || $data['action'] === 'unmute') {
            $status = UserStatus::where('status_id', $status_id)->where('user_id', $user->id)->first();
            UserStatus::destroy($status->id);
        }

        if ($data['action'] === 'ban' || $data['action'] === 'flag' || $data['action'] === 'mute') {
            UserStatus::create([
                'status_id' => $status_id,
                'user_id' => $user->id
            ]);
        };

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

        if (!$authUser->isAdmin()) {
            return;
        }

        $data = $request->only('name', 'email', 'role_id', 'paid_balance', 'free_balance');

        $validator = Validator::make($data, [
            'name' => [
                'required',
                Rule::unique('users')->ignore($user->id),
                'max:15'
            ],
            'email' => [
                'nullable',
                Rule::unique('users')->ignore($user->id),
                'email'
            ],
            'paid_balance' => [
                'required',
                'numeric',
                'min:0'
            ],
            'free_balance' => [
                'required',
                'numeric',
                'min:0'
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

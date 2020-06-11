<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ClientController extends Controller
{
    //
    public function profile(){
        //
        $user = auth()->user();
        return view('clients.profile', compact('user'));
    }
    public function updateProfile(Request $request, User $user){
        //
        $attributes = $request->validate([
            'username' => 'required|string|max:20|min:3',
            'email' => ['required', 'string', 'email', Rule::unique('users')->ignore($user)],
            'first_name' => 'required|string|max:15|min:3',
            'last_name' => 'required|string|max:15|min:3',
            'avatar' => 'image',
        ]);

        if ($request->avatar) {
            $clientAvatar = $user->getAttributes()['avatar'];
            if (isset($clientAvatar) && $clientAvatar) {
                Storage::delete($clientAvatar);
            }

            $attributes['avatar'] = $request->avatar->store('client_avatars');
        }

        $user->update($attributes);

        session()->flash('success', 'Profile Updated Successfully');
        return redirect()->back();
    }

    public function changePasswordForm(){
        //
        $user = auth()->user();
        return view('clients.change_password', compact('user'));
    }
    public function changePassword(Request $request, User $user){
        $attributes = $request->validate([
            'password' => 'required|confirmed|string|min:6',
        ]);
        $attributes['password'] = bcrypt($attributes['password']);

        $user->update($attributes);

        session()->flash('success', 'Password Updated Successfully');
        return redirect()->back();
    }

    public function favorites()
    {
        $user = auth()->user();
        $favorites = $user->favorites()->latest()->paginate(10);
        return view('clients.favorites', compact('user', 'favorites'));
    }

    public function ratings()
    {
        $user = auth()->user();
        $ratings = $user->ratings()->latest()->paginate(10);
        return view('clients.ratings', compact('user', 'ratings'));
    }

    public function reviews()
    {
        $user = auth()->user();
        $reviews = $user->reviews()->latest()->paginate(10);
        return view('clients.reviews', compact('user', 'reviews'));
    }

}

<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit');
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'profile_picture' => 'required|regex:/^#[0-9A-Fa-f]{6}$/',
        ]);

        $user->update([
            'name' => $request->name,
            'profile_picture' => $request->profile_picture, 
        ]);

        return back()->with('success', 'Profil berhasil diperbarui!');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()->orderBy('full_name')->get();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'username' => ['required', 'string', 'alpha_dash', 'max:80', 'unique:users,username'],
            'full_name' => ['required', 'string', 'max:255'],
        ]);

        User::create([
            ...$validated,
            'name' => $validated['full_name'],
            'email' => $validated['username'] . '@pos.local',
            'password' => Hash::make(Str::random(40)),
        ]);

        return redirect()->route('users.index')->with('status', 'User account created.');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $validated = $request->validate([
            'username' => ['required', 'string', 'alpha_dash', 'max:80', 'unique:users,username,' . $user->id],
            'full_name' => ['required', 'string', 'max:255'],
            'avatar' => ['nullable', 'image', 'max:2048'],
        ]);

        $user->username = $validated['username'];
        $user->full_name = $validated['full_name'];
        $user->name = $validated['full_name'];

        if ($request->hasFile('avatar')) {
            $newAvatarPath = $this->prepareAvatar($request->file('avatar'));

            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }

            $user->avatar = $newAvatarPath;
        }

        $user->save();

        return redirect()->route('users.index')->with('status', 'User account updated.');
    }

    private function prepareAvatar(\Illuminate\Http\UploadedFile $file): string
    {
        $image = (new ImageManager(new Driver()))
            ->read($file->getRealPath())
            ->cover(256, 256)
            ->toWebp(85);

        $path = 'avatars/' . Str::uuid() . '.webp';
        Storage::disk('public')->put($path, (string) $image);

        return $path;
    }
}

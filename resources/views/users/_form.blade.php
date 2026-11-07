<div class="form-grid">
    <div><label for="username">Username</label><input id="username" name="username" value="{{ old('username', $user->username ?? '') }}" required maxlength="80" pattern="[A-Za-z0-9_-]+" autocomplete="off">@error('username')<span class="field-error">{{ $message }}</span>@enderror</div>
    <div><label for="full_name">Full name</label><input id="full_name" name="full_name" value="{{ old('full_name', $user->full_name ?? '') }}" required maxlength="255">@error('full_name')<span class="field-error">{{ $message }}</span>@enderror</div>
    @if ($showAvatar ?? false)
    <div><label for="avatar">Profile picture <span class="muted">(optional, image up to 2MB)</span></label><input id="avatar" type="file" name="avatar" accept="image/*">@error('avatar')<span class="field-error">{{ $message }}</span>@enderror @if (!empty($user->avatar_url))<p><img class="avatar large" src="{{ $user->avatar_url }}" alt="Current avatar"></p>@endif</div>
    @endif
    <div><button class="button" type="submit">{{ $submitLabel }}</button> <a class="button secondary" href="{{ route('users.index') }}">Cancel</a></div>
</div>

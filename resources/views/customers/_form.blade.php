<div class="form-grid">
    <div><label for="full_name">Full name</label><input id="full_name" name="full_name" value="{{ old('full_name', $customer->full_name ?? '') }}" required maxlength="255">@error('full_name')<span class="field-error">{{ $message }}</span>@enderror</div>
    <div><label for="email">Email</label><input id="email" type="email" name="email" value="{{ old('email', $customer->email ?? '') }}" required maxlength="255">@error('email')<span class="field-error">{{ $message }}</span>@enderror</div>
    <div><label for="phone">Phone <span class="muted">(optional)</span></label><input id="phone" name="phone" value="{{ old('phone', $customer->phone ?? '') }}" maxlength="30">@error('phone')<span class="field-error">{{ $message }}</span>@enderror</div>
    <div><button class="button" type="submit">{{ $submitLabel }}</button> <a class="button secondary" href="{{ route('customers.index') }}">Cancel</a></div>
</div>

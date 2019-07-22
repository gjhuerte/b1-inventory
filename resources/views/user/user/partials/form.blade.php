
<div class="form-group">
    <label for="name">Full Name</label>
    <input
        type="text"
        id="name"
        class="form-control"
        placeholder="John Doe"
        name="name"
        value="{{ $user->name ?? old('name') }}"
        required />
</div>

<div class="form-group">
    <label for="email">E-Mail</label>
    <input
        type="email"
        id="email"
        class="form-control"
        placeholder="John Doe"
        name="email"
        value="{{ $user->email ?? old('email') }}"
        required />
</div>

<div class="form-group">
    <label for="type">Type</label>
    
    <select
        name="type"
        id="type"
        class="form-control">
        @foreach($types as $key => $value)
            <option 
                @if(isset($user->type))
                    @if($key == $user->type)
                        checked
                    @endif
                @endif
                value="{{ $key }}">
                {{ $value }}
            </option>
        @endforeach
    </select>
</div>

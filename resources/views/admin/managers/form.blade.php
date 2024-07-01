<div class="card-body">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="fullname">Full Name</label>
            <input type="text" class="form-control @error('fullname') is-invalid @enderror" id="fullname"
                   name="fullname" value="{{ old('fullname', $manager->fullname ?? '') }}"
                   placeholder="Enter Full Name">
            @error('fullname')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group col-md-6">
            <label for="email">Email</label>
            <input autocomplete="new-email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                   value="{{ old('email', $manager->email ?? '') }}" placeholder="Enter Email">
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="username">Username</label>
            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                   name="username" value="{{ old('username', $manager->username ?? '') }}" placeholder="Enter Username">
            @error('username')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group col-md-6">
            <label for="password">Password</label>
            <input autocomplete="new-password" type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                   name="password" placeholder="Enter Password">
            @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                   id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
            @error('password_confirmation')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="card-action text-center">
    <button type="submit" class="btn btn-info">Submit <i class="fa fa-save"></i></button>
</div>

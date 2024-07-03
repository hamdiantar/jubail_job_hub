@extends('company.shared.app')

@section('content')
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Update Company Information</h4>
                    </div>
                    <form action="{{ route('company.profile', $company->company_id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                                           name="username" value="{{ old('username', $company->username) }}"
                                           placeholder="Enter Username">
                                    @error('username')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input autocomplete="new-email" type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                           name="email" value="{{ old('email', $company->email) }}" placeholder="Enter Email">
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                                           name="password" placeholder="Enter Password">
                                    <small class="form-text text-muted">The password must be at least 8 characters long and contain at least one letter, one digit, and one symbol (@$!%*#?&).</small>
                                    @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation"
                                           name="password_confirmation" placeholder="Confirm Password">
                                    @error('password_confirmation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="fullname">Owner Name</label>
                                    <input type="text" class="form-control @error('fullname') is-invalid @enderror" id="fullname"
                                           name="fullname" value="{{ old('fullname', $company->fullname) }}"
                                           placeholder="Enter Full Name">
                                    @error('fullname')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="company_name">Company Name</label>
                                    <input type="text" class="form-control @error('company_name') is-invalid @enderror" id="company_name"
                                           name="company_name" value="{{ old('company_name', $company->company_name) }}"
                                           placeholder="Enter Company Name">
                                    @error('company_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="phone_number_1">Primary Phone Number</label>
                                    <input type="text" class="form-control @error('phone_number_1') is-invalid @enderror" id="phone_number_1"
                                           name="phone_number_1" value="{{ old('phone_number_1', $company->phone_number_1) }}"
                                           placeholder="Enter Primary Phone Number" onkeypress="return isNumber(event)">
                                    <small class="form-text text-muted">The phone number must start with +96605 or 05 followed by 8 digits.</small>
                                    @error('phone_number_1')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="phone_number_2">Secondary Phone Number</label>
                                    <input type="text" class="form-control @error('phone_number_2') is-invalid @enderror" id="phone_number_2"
                                           name="phone_number_2" value="{{ old('phone_number_2', $company->phone_number_2) }}"
                                           placeholder="Enter Secondary Phone Number" onkeypress="return isNumber(event)">
                                    <small class="form-text text-muted">The phone number must start with +96605 or 05 followed by 8 digits.</small>
                                    @error('phone_number_2')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="website_url">Website URL</label>
                                    <input type="url" class="form-control @error('website_url') is-invalid @enderror" id="website_url"
                                           name="website_url" value="{{ old('website_url', $company->website_url) }}"
                                           placeholder="Enter Website URL">
                                    @error('website_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="linkedin_url">LinkedIn URL</label>
                                    <input type="url" class="form-control @error('linkedin_url') is-invalid @enderror" id="linkedin_url"
                                           name="linkedin_url" value="{{ old('linkedin_url', $company->linkedin_url) }}"
                                           placeholder="Enter LinkedIn URL">
                                    @error('linkedin_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="twitter_url">Twitter URL</label>
                                    <input type="url" class="form-control @error('twitter_url') is-invalid @enderror" id="twitter_url"
                                           name="twitter_url" value="{{ old('twitter_url', $company->twitter_url) }}"
                                           placeholder="Enter Twitter URL">
                                    @error('twitter_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="industry">Industry</label>
                                    <select class="form-control @error('industry') is-invalid @enderror" name="industry" id="industry">
                                        <option value="">Select Industry</option>
                                        <option value="Technology" {{ old('industry', $company->industry) == 'Technology' ? 'selected' : '' }}>Technology</option>
                                        <option value="Finance" {{ old('industry', $company->industry) == 'Finance' ? 'selected' : '' }}>Finance</option>
                                        <option value="Healthcare" {{ old('industry', $company->industry) == 'Healthcare' ? 'selected' : '' }}>Healthcare</option>
                                        <option value="Education" {{ old('industry', $company->industry) == 'Education' ? 'selected' : '' }}>Education</option>
                                        <option value="Retail" {{ old('industry', $company->industry) == 'Retail' ? 'selected' : '' }}>Retail</option>
                                        <!-- Add other industries as needed -->
                                    </select>
                                    @error('industry')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="company_size">Select Company Size</label>
                                    <select class="form-control @error('company_size') is-invalid @enderror" name="company_size" id="company_size">
                                        <option value="">Select Company Size</option>
                                        <option value="small" {{ old('company_size', $company->company_size) == 'small' ? 'selected' : '' }}>Small</option>
                                        <option value="medium" {{ old('company_size', $company->company_size) == 'medium' ? 'selected' : '' }}>Medium</option>
                                        <option value="large" {{ old('company_size', $company->company_size) == 'large' ? 'selected' : '' }}>Large</option>
                                    </select>
                                    @error('company_size')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="founded_at">Founded At</label>
                                    <input type="date" class="form-control @error('founded_at') is-invalid @enderror" id="founded_at"
                                           name="founded_at" max="{{ date('Y-m-d') }}" value="{{ old('founded_at', $company->founded_at) }}"
                                           placeholder="Enter Founded Date">
                                    @error('founded_at')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="logo">Company Logo</label>
                                    <input type="file" class="form-control-file @error('logo') is-invalid @enderror" id="logo" name="logo">
                                    <small class="form-text text-muted">Upload your company logo (JPG, PNG, or GIF).</small>
                                    @error('logo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <img src="{{$company->image_path}}" class="img-thumbnail" height="100px" width="100px">
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="about_company">About Company</label>
                                    <textarea class="form-control w-100 @error('about_company') is-invalid @enderror" name="about_company" id="about_company" cols="30" rows="5"
                                              placeholder="About Company">{{ old('about_company', $company->about_company) }}</textarea>
                                    @error('about_company')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-12 text-center mb-4">
                            <button type="submit" class="btn btn-primary">Update Profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

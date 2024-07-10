<div class="card-body">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="job_title">Job Title <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('job_title') is-invalid @enderror" id="job_title" name="job_title"
                   value="{{ old('job_title', isset($jobAd) ? $jobAd->job_title : '') }}" placeholder="Enter Job Title" required>
            @error('job_title')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group col-md-6">
            <label for="job_type">Job Type <span class="text-danger">*</span></label>
            <select class="form-control @error('job_type') is-invalid @enderror" id="job_type" name="job_type" required>
                <option value="">Select Job Type</option>
                <option value="Full-time" {{ old('job_type', isset($jobAd) && $jobAd->job_type == 'Full-time' ? 'selected' : '') }}>Full-time</option>
                <option value="Part-time" {{ old('job_type', isset($jobAd) && $jobAd->job_type == 'Part-time' ? 'selected' : '') }}>Part-time</option>
                <option value="Remote" {{ old('job_type', isset($jobAd) && $jobAd->job_type == 'Remote' ? 'selected' : '') }}>Remote</option>
                <option value="Freelance" {{ old('job_type', isset($jobAd) && $jobAd->job_type == 'Freelance' ? 'selected' : '') }}>Freelance</option>
                <option value="Contract" {{ old('job_type', isset($jobAd) && $jobAd->job_type == 'Contract' ? 'selected' : '') }}>Contract</option>
                <option value="Temporary" {{ old('job_type', isset($jobAd) && $jobAd->job_type == 'Temporary' ? 'selected' : '') }}>Temporary</option>
                <option value="Internship" {{ old('job_type', isset($jobAd) && $jobAd->job_type == 'Internship' ? 'selected' : '') }}>Internship</option>
            </select>
            @error('job_type')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group col-md-6">
            <label for="experience_level">Experience Level <span class="text-danger">*</span></label>
            <select class="form-control @error('experience_level') is-invalid @enderror" id="experience_level" name="experience_level" required>
                <option value="">Select Experience Level</option>
                <option value="Entry" {{ old('experience_level', isset($jobAd) && $jobAd->experience_level == 'Entry' ? 'selected' : '') }}>Entry</option>
                <option value="Mid" {{ old('experience_level', isset($jobAd) && $jobAd->experience_level == 'Mid' ? 'selected' : '') }}>Mid</option>
                <option value="Senior" {{ old('experience_level', isset($jobAd) && $jobAd->experience_level == 'Senior' ? 'selected' : '') }}>Senior</option>
                <option value="Manager" {{ old('experience_level', isset($jobAd) && $jobAd->experience_level == 'Manager' ? 'selected' : '') }}>Manager</option>
            </select>
            @error('experience_level')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group col-md-6">
            <label for="education_level">Education Level <span class="text-danger">*</span></label>
            <select class="form-control @error('education_level') is-invalid @enderror" id="education_level" name="education_level" required>
                <option value="">Select Education Level</option>
                <option value="High School" {{ old('education_level', isset($jobAd) && $jobAd->education_level == 'High School' ? 'selected' : '') }}>High School</option>
                <option value="Associate's Degree" {{ old('education_level', isset($jobAd) && $jobAd->education_level == "Associate's Degree" ? 'selected' : '') }}>Associate's Degree</option>
                <option value="Bachelor's Degree" {{ old('education_level', isset($jobAd) && $jobAd->education_level == "Bachelor's Degree" ? 'selected' : '') }}>Bachelor's Degree</option>
                <option value="Master's Degree" {{ old('education_level', isset($jobAd) && $jobAd->education_level == "Master's Degree" ? 'selected' : '') }}>Master's Degree</option>
                <option value="Doctorate" {{ old('education_level', isset($jobAd) && $jobAd->education_level == 'Doctorate' ? 'selected' : '') }}>Doctorate</option>
            </select>
            @error('education_level')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <div class="form-group col-md-6">
            <label for="job_description">Job Descriptions <span class="text-danger">*</span></label>
            <textarea class="form-control @error('job_description') is-invalid @enderror" id="job_description" name="job_description" rows="3" placeholder="Enter job description" required>{{ old('job_description', isset($jobAd) ? $jobAd->job_description : '') }}</textarea>
            @error('job_description')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group col-md-6">
            <label for="requirements">Requirements <span class="text-danger">*</span></label>
            <textarea class="form-control @error('requirements') is-invalid @enderror" id="requirements" name="requirements" rows="3" placeholder="Enter Requirements" required>{{ old('requirements', isset($jobAd) ? $jobAd->requirements : '') }}</textarea>
            @error('requirements')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>



        <div class="form-group col-md-6">
            <label for="skills_required">Skills Required</label>
            <textarea class="form-control @error('skills_required') is-invalid @enderror" id="skills_required" name="skills_required" rows="3" placeholder="Enter Skills Required">{{ old('skills_required', isset($jobAd) ? $jobAd->skills_required : '') }}</textarea>
            @error('skills_required')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group col-md-6">
            <label for="skills_required">Benefits</label>
            <textarea class="form-control @error('benefits') is-invalid @enderror" id="benefits" name="benefits" rows="3" placeholder="Enter benefits">{{ old('benefits', isset($jobAd) ? $jobAd->benefits : '') }}</textarea>
            @error('benefits')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group col-md-6">
            <label for="salary">Salary</label>
            <input type="number" class="form-control @error('salary') is-invalid @enderror" id="salary" name="salary" value="{{ old('salary', isset($jobAd) ? $jobAd->salary : '') }}" placeholder="Enter Salary">
            @error('salary')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>



        <div class="form-group col-md-6">
            <label for="location">Location <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" value="{{ old('location', isset($jobAd) ? $jobAd->location : '') }}" placeholder="Enter Location" required>
            @error('location')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group col-md-6">
            <label for="working_hours">Working Hours</label>
            <input type="number" class="form-control @error('working_hours') is-invalid @enderror" id="working_hours" name="working_hours" value="{{ old('working_hours', isset($jobAd) ? $jobAd->working_hours : '') }}" placeholder="Enter Working Hours">
            @error('working_hours')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group col-md-6">
            <label for="application_deadline">Application Deadline <span class="text-danger">*</span></label>
            <input type="date" class="form-control @error('application_deadline') is-invalid @enderror" id="application_deadline" name="application_deadline" value="{{ old('application_deadline', isset($jobAd) ? $jobAd->application_deadline : '') }}" required min="{{ now()->format('Y-m-d') }}">
            @error('application_deadline')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>



        <div class="form-group col-md-6">
            <label for="categories">Categories <span class="text-danger">*</span></label>
            <select multiple class="form-control select2 @error('categories') is-invalid @enderror" id="categories" name="categories[]" required>
                @foreach($categories as $category)
                    <option value="{{ $category->job_category_id }}" {{ (collect(old('categories', isset($jobAd) ? $jobAd->categories->pluck('job_category_id') : []))->contains($category->job_category_id)) ? 'selected':'' }}>{{ $category->job_category_name }}</option>
                @endforeach
            </select>
            @error('categories')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class=" col-md-6 form-check mt-4">
            <label class="form-check-label">
                <input type="hidden" name="is_published" value="0">
                <input class="form-check-input" type="checkbox" name="is_published" value="1" {{ old('is_published', isset($jobAd) && $jobAd->is_published ? 'checked' : '') }}>
                <span class="form-check-sign"> Publish ad when finish creating?</span>
            </label>
        </div>
    </div>
</div>

<div class="card-action text-center">
    <button type="submit" class="btn btn-info">Submit <i class="fa fa-save"></i></button>
</div>

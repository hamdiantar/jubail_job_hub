<div class="card-body">
    <div class="form-group">
        <label for="job_category_name">Job Category Name</label>
        <input type="text" class="form-control @error('job_category_name') is-invalid @enderror" id="job_category_name"
               name="job_category_name" value="{{ old('job_category_name', $jobCategory->job_category_name ?? '') }}"
               placeholder="Enter Job Category Name">
        @error('job_category_name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="card-action text-center">
    <button type="submit" class="btn btn-info">Submit <i class="fa fa-save"></i></button>
</div>

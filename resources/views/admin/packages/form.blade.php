<div class="card-body">
    <div class="form-row">
    <div class="form-group col-md-6">
        <label for="type">Select Package Period</label>
        <select class="form-control @error('type') is-invalid @enderror" id="type" name="type">
            <option value="">Select Type</option>
            <option value="Monthly" {{ old('type', $package->type ?? '') == 'Monthly' ? 'selected' : '' }}>Monthly</option>
            <option value="Quarterly" {{ old('type', $package->type ?? '') == 'Quarterly' ? 'selected' : '' }}>Quarterly</option>
            <option value="Yearly" {{ old('type', $package->type ?? '') == 'Yearly' ? 'selected' : '' }}>Yearly</option>
        </select>
        @error('type')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group col-md-6">
        <label for="price">Price</label>
        <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price', $package->price ?? '') }}" placeholder="Enter Price">
        @error('price')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group col-md-12">
        <label for="description">Description</label>
        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description', $package->description ?? '') }}</textarea>
        @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

        <div class="form-group col-md-12">
            <input  type="hidden" name="is_available" value="0">
        <input class="" type="checkbox" id="is_available" name="is_available" value="1" {{ old('is_available', isset($package) ? ($package->is_available ? 'checked' : '') : '') }}>
        <label class="form-check-label" for="is_available">Is Available</label>
    </div>
</div>
</div>

<div class="card-action text-center">
    <button type="submit" class="btn btn-info">Submit <i class="fa fa-save"></i></button>
</div>

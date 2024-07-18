@extends('company.shared.app')

@section('content')
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Application Details</h4>
                    </div>
                    <div class="card-body">
                        <h5>Job Seeker Information</h5>
                        <ul>
                            <li><strong>Name:</strong> {{ $application->jobSeeker->fullname }}</li>
                            <li><strong>Email:</strong> {{ $application->jobSeeker->email }}</li>
                            <li><strong>Phone:</strong> {{ $application->jobSeeker->phone_number }}</li>
                            <li><strong>Experience Level:</strong> {{ $application->jobSeeker->experience_level }}</li>
                            <li><strong>Address:</strong> {{ $application->jobSeeker->address }}</li>
                        </ul>
                        <iframe src="{{ asset($application->jobSeeker->cv) }}" style="width:100%; height:500px;"></iframe>

                        <h5>Application Information</h5>
                        <ul>
                            <li><strong>Job Title:</strong> {{ $application->job->job_title }}</li>
                            <li><strong>Application Date:</strong> {{ date('Y-m-d H:i A', strtotime($application->application_date)) }}</li>
                            <li><strong>Interview Date:</strong> {{ $application->interview_date ? date('Y-m-d H:i A', strtotime($application->interview_date))  : 'N/A' }}</li>
                            <li><strong>Last Status:</strong> {{ $application->applicationStatuses->last()->status ?? 'Pending' }}</li>
                        </ul>
                        <h5>Update Application Status</h5>
                        <form action="{{ route('company.applications.updateStatus', $application->application_id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" name="status" onchange="toggleInterviewDate(this.value)">
                                    @foreach(\App\Constants\ApplicationStatus::getStatuses() as $status)
                                        <option value="{{ $status }}" {{ $application->applicationStatuses && $application->applicationStatuses->isNotEmpty() && $application->applicationStatuses->last()->status == $status ? 'selected' : '' }}>{{ $status }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group" id="interviewDateGroup" style="display: none;">
                                <label for="interview_date">Interview Date</label>
                                <input type="datetime-local" class="form-control" id="interview_date" name="interview_date" value="{{ old('interview_date', date('Y-m-d\TH:i', strtotime($application->interview_date ?? now()))) }}" min="{{ date('Y-m-d\TH:i') }}">
                            </div>
                            <div class="form-group">
                                <label for="notes">Notes</label>
                                <textarea class="form-control" id="notes" name="notes" rows="4">{{ old('notes', $application->applicationStatuses && $application->applicationStatuses->isNotEmpty() ? $application->applicationStatuses->last()->notes : '') }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Status</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleInterviewDate(status) {
            const interviewDateGroup = document.getElementById('interviewDateGroup');
            if (status === '{{ \App\Constants\ApplicationStatus::INTERVIEW_SCHEDULED }}') {
                interviewDateGroup.style.display = 'block';
                document.getElementById('interview_date').required = true;
            } else {
                interviewDateGroup.style.display = 'none';
                document.getElementById('interview_date').required = false;
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            toggleInterviewDate(document.getElementById('status').value);
        });
    </script>
@endsection

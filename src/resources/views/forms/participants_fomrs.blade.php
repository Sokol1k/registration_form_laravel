<div id="firstForm" class="col-md-6 offset-md-3 form">
    <div class="text-center">
        <h4>To participate in the conference, please fill out the form</h4>
        @if ($userCount)
        <a href='{{ route('participant.index') }}'>All members ({{$userCount}})</a>
        @else
        <div>No participants</div>
        @endif
    </div>
    <form id="registrationForm" method="POST" action="{{ route('participant.store') }}">

        {{ csrf_field() }}

        <div class="form-group">
            <label for="inputFirstName" class="ml-1">Firstname <small style="color: red;">*</small></label>
            <input id="inputFirstName" class="form-control" type="text" name="firstname" placeholder="Enter your Firstname">
            <small class="error ml-1"></small>
        </div>

        <div class="form-group">
            <label for="inputLastName" class="ml-1">Lastname <small style="color: red;">*</small></label>
            <input id="inputLastName" class="form-control" type="text" name="lastname" placeholder="Enter your Lastname">
            <small class="error ml-1"></small>
        </div>

        <div class="form-group">
            <label for="inputBirthDate" class="ml-1">Birth Date <small style="color: red;">*</small></label>
            <input id="inputBirthDate" class="form-control" type="text" name="birthdate" placeholder="Enter your Birth Date">
            <small class="error ml-1"></small>
        </div>

        <div class="form-group">
            <label for="inputReportSubject" class="ml-1">Report Subject <small style="color: red;">*</small></label>
            <input id="inputReportSubject" class="form-control" type="text" name="report_subject" placeholder="Enter your Report Subject">
            <small class="error ml-1"></small>
        </div>

        <div class="form-group">
            <label for="inputCountry" class="ml-1">Country <small style="color: red;">*</small></label>
            <input id="inputCountry" class="form-control" type="text" name="country" placeholder="Choose your Country">
            <small class="error ml-1"></small>
        </div>

        <div class="form-group">
            <label for="inputPhone" class="ml-1">Phone <small style="color: red;">*</small></label>
            <input id="inputPhone" class="form-control" type="text" name="phone">
            <small class="error ml-1"></small>
        </div>

        <div class="form-group">
            <label for="inputEmail" class="ml-1">Email <small style="color: red;">*</small></label>
            <input id="inputEmail" class="form-control" type="email" name="email" placeholder="Enter your Email">
            <small class="error ml-1"></small>
        </div>

        <div class="text-right">
            <button class="btn btn-primary" type="submit" name="submit">Next</button>
        </div>

    </form>
</div>

<div id="secondForm" class="col-md-6 offset-md-3 form">
    <div class="text-center">
        <a href="{{ route('participant.index') }}">All members (<label class="userCount"></label>)</a>
    </div>
    <form id="addingInformationForm" method="POST" action="" enctype="multipart/form-data">

        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <div class="form-group">
            <label for="inputCompany" class="ml-1">Company</label>
            <input id="inputCompany" class="form-control" type="text" name="company" placeholder="Enter your Company">
            <small class="error ml-1"></small>
        </div>

        <div class="form-group">
            <label for="inputPosition" class="ml-1">Position</label>
            <input id="inputPosition" class="form-control" type="text" name="position" placeholder="Enter your Position">
            <small class="error ml-1"></small>
        </div>

        <div class="form-group">
            <label for="inputAboutMe" class="ml-1">About Me</label>
            <textarea id="inputAboutMe" class="form-control" type="text" name="about_me" placeholder="Write some about yourself" rows="3" style="resize: none;"></textarea>
            <small class="error ml-1"></small>
        </div>

        <div class="form-group">
            <label class="ml-1">Photo</label>
            <div class="custom-file file__input">
                <input id="inputPhoto" class="custom-file-input" type="file" name="photo" accept="image/gif, image/png, image/jpeg">
                <label class="custom-file-label" for="inputPhoto">Choose file</label>
                <small class="error ml-1"></small>
                <div id="delete" class="error delete">x</div>
            </div>
            <small class="error ml-1"></small>
        </div>

        <div class="text-right">
            <button class="btn btn-primary" type="submit" name="submit">Next</button>
        </div>

    </form>
</div>

<div id="shareForm" class="col-md-6 offset-md-3 form">
    <div class="text-center">
        <h4>Share</h4>
        <a href="{{ route('participant.index') }}">All members (<label class="userCount"></label>)</a>
    </div>
    <div class="mt-2">
        <a href="{{ route('participant.create') }}" class="btn btn-lg btn-block btn-success">Home</a>
        <a target="_blank" class="btn btn-lg btn-block" href="https://www.facebook.com/sharer.php?u={{ url()->to('/participant/create')}}" style="background-color: #3b5998; color: #fff">Facebook</a>
        <a target="_blank" class="btn btn-lg btn-block" href="https://twitter.com/intent/tweet?text={{ config('const.TW_TEXT') }} URL:{{ url()->to('/participant/create')}}" style="background-color: #00acee; color: #fff">Twitter</a>
    </div>
</div>

@push('scripts')
<script src="{{ URL::asset('js/registrationForm.js') }}"></script>
<script src="{{ URL::asset('js/addingInformationForm.js') }}"></script>
@endpush
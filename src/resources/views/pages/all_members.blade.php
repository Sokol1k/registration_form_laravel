@extends('layouts.template')

@section('content')
<div class="container">
    <div class="m-2">
        <a href="{{ route('participant.create') }}" class="btn btn-primary">Back</a>
    </div>
    <table class="table table-striped">
        <thead class="thead-light ">
            <tr>
                @if (Auth::check())
                <th>Hide</th>
                @endif
                <th>Photo</th>
                <th>Full name</th>
                <th>Report Subject</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($members as $member)
            <tr>
                @if (Auth::check())
                <td><input type="checkbox" name="userId" value="{{ $member->id }}" @if ($member->deleted_at) checked @endif></td>
                @endif
                <td><img class="all__members__img" src="{{ $member->photo ? !ctype_digit($member->photo[-1]) ? asset('/storage/' . config('const.PATH_PHOTO') . '/' . $member->photo) : $member->photo : '/img/def.jpg'}}" alt="Photo"></td>
                <td>{{ $member->firstname }} {{ $member->lastname }}</td>
                <td>{{ $member->report_subject }}</td>
                <td><a href="mailto:{{ $member->email }}">{{ $member->email }}</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class='position-relative text-center'>
        <div class="position-absolute" style="left: 50%; transform: translateX(-50%);">
            {{ $members->links() }}
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="{{ URL::asset('js/hideMembers.js') }}"></script>
@endpush
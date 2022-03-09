@extends('formbuilder::layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card rounded-0" style="margin-top:7%">
                <div class="card-header">
                    <h5 class="card-title">
                        Viewing Submission #{{ $submission->id }} for form '{{ $submission->form->name }}'

                        <div class="btn-toolbar float-right" role="toolbar">
                            <div class="btn-group" role="group" aria-label="First group">
                                <a href="{{ route('formbuilder::forms.submissions.index', $submission->form->id) }}" class="btn btn-primary float-md-right btn-sm" title="Back To Submissions">
                                    <i class="fa fa-arrow-left"></i>
                                </a>
                                <form action="{{ route('formbuilder::forms.submissions.destroy', [$submission->form, $submission]) }}" method="POST" id="deleteSubmissionForm_{{ $submission->id }}" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-sm rounded-0 confirm-form" data-form="deleteSubmissionForm_{{ $submission->id }}" data-message="Delete submission" title="Delete this submission?">
                                        <i class="fa fa-trash-o"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </h5>
                </div>

                <form method="POST" action="{{ route('formbuilder::store.score') }}" >
                    @csrf
                <ul class="list-group list-group-flush">
                    @php $score = 0; $total = 0;@endphp
                    @foreach($form_headers as $header)

                        <li class="list-group-item">
                            <strong>{{ $header['label'] ?? title_case($header['name']) }}: </strong><br />
                            <span class="float-right">
                                {{ $submission->renderEntryContent($header['name'], $header['type']) }}
                            </span>
                            <div class="mt-4">
                                <label>
                                    Add Score <b>({{ $header['score'] }})</b>
                                </label>
                                @php
                                    $details = \App\Models\FormSubmissionDetail::where('name', $header['name'])->pluck('gained_score');
                                    $score += $details[0];
                                    $total += $header['score'];
                                @endphp
                                 <input type="number" name="{{$header['name']}}" value="{{ $details[0] }}" class="form-control"></div>
                        </li>
                    @endforeach
                </ul>
                    <button type="submit" class="btn btn-success">SUBMIT</button>
                </form>
                <div class="font-weight-bold"> Total Score : {{$score}} / {{ $total }} </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card rounded-0">
                <div class="card-header">
                    <h5 class="card-title">Details</h5>
                </div>

                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <strong>Form: </strong>
                        <span class="float-right">{{ $submission->form->name }}</span>
                    </li>
                    <li class="list-group-item">
                        <strong>Submitted By: </strong>
                        <span class="float-right">{{ $submission->user->name ?? 'Guest' }}</span>
                    </li>
                    <li class="list-group-item">
                        <strong>Last Updated On: </strong>
                        <span class="float-right">{{ $submission->updated_at->toDayDateTimeString() }}</span>
                    </li>
                    <li class="list-group-item">
                        <strong>Submitted On: </strong>
                        <span class="float-right">{{ $submission->created_at->toDayDateTimeString() }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

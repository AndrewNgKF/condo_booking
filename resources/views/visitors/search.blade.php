@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Search for a Visitor</h2>
            </div>
            {{-- <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('residentialunits.index') }}"> Back</a>
            </div> --}}
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('visitors.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Visitor's Name:</strong>
                    <input value="{{ old('visitor_name') }}" type="text" name="visitor_name" class="form-control"
                        placeholder="Visitor's Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Visitor's last 3 digits of NRIC:</strong>
                    <input value="{{ old('NRICLast3Digits') }}" type="text" name="NRICLast3Digits" class="form-control"
                        placeholder="Visitor's last 3 digits of NRIC">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Visitor Contact Number:</strong>
                    <input value="{{ old('visitor_contact') }}" type="text" name="visitor_contact" class="form-control"
                        placeholder="Occupant Contact Number">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Resident's Block Number:</strong>
                    <input value="{{ old('block_number') }}" type="text" name="block_number" class="form-control"
                        placeholder="Block Number">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Resident's Unit Number:</strong>
                    <input value="{{ old('unit_number') }}" type="text" name="unit_number" class="form-control"
                        placeholder="Visiting Resident Unit Number">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection

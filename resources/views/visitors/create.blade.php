@extends('layouts.app')
@section('content')


    <div class="mx-auto text-center">

        <div class="mx-16 py-12 text-black text-4xl font-bold ">Visitors Entry Log Form
        </div>


        {{-- <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('residentialunits.index') }}"> Back</a>
            </div> --}}
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

    <form action="{{ route('visitors.store') }}" method="POST" class="mx-auto px-16">
        @csrf


        <div class="mb-4">
            <div class="form-group">
                <div class="block text-grey-darker text-xl font-bold mb-2">Visitor's Name:</div>
                <input class="border rounded w-full py-2 px-3 text-grey-darker" value="{{ old('visitor_name') }}"
                    type="text" name="visitor_name" class="form-control" placeholder="Visitor's Name">
            </div>
        </div>
        <div class="mb-4">
            <div class="form-group">
                <div class="block text-grey-darker text-xl font-bold mb-2">Visitor's last 3 digits of NRIC:</div>
                <input class="border rounded w-full py-2 px-3 text-grey-darker" value="{{ old('NRICLast3Digits') }}"
                    type="text" name="NRICLast3Digits" class="form-control" placeholder="Visitor's last 3 digits of NRIC">
            </div>
        </div>
        <div class="mb-4">
            <div class="form-group">
                <div class="block text-grey-darker text-xl font-bold mb-2">Visitor Contact Number:</div>
                <input class="border rounded w-full py-2 px-3 text-grey-darker" value="{{ old('visitor_contact') }}"
                    type="text" name="visitor_contact" class="form-control" placeholder="Occupant Contact Number">
            </div>
        </div>
        <div class="mb-4">
            <div class="form-group">
                <div class="block text-grey-darker text-xl font-bold mb-2">Resident's Block Number:</div>
                <input class="border rounded w-full py-2 px-3 text-grey-darker" value="{{ old('block_number') }}"
                    type="text" name="block_number" class="form-control" placeholder="Block Number">
            </div>
        </div>
        <div class="mb-4">
            <div class="form-group">
                <div class="block text-grey-darker text-xl font-bold mb-2">Resident's Unit Number:</div>
                <input class="border rounded w-full py-2 px-3 text-grey-darker" value="{{ old('unit_number') }}"
                    type="text" name="unit_number" class="form-control" placeholder="Visiting Resident Unit Number">
            </div>
        </div>

        <div class="mb-4">
            <button type="submit"
                class="w-full bg-blue-500 px-4 py-2 rounded text-gray-200 font-semibold text-xl hover:bg-blue-600 transition duration-200 each-in-out">Submit</button>
        </div>

    </form>
@endsection

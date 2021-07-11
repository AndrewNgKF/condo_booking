@extends('layouts.app')
@section('content')


    <div class="container mx-auto">

        <div class="pl-4 pt-2">
            <a class="text-gray-800 font-light" href="{{ route('residentialunits.index') }}">Back to Residential Units</a>
        </div>

        <div class="mx-16 py-4 px-8 text-black text-xl font-bold border-b border-grey-500">Edit Residential Unit</div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('residentialunits.update', $residentialUnit->id) }}" method="POST" class="mx-auto px-16">
        @csrf

        @method('PUT')

        <div class="mb-4">
            <div class="form-group">
                <div class="block text-grey-darker text-sm font-bold mb-2">Occupant Name:</div>
                <input type="text" class="border rounded w-full py-2 px-3 text-grey-darker" name="occupant_name"
                    value="{{ $residentialUnit->occupant_name }}" class="form-control" placeholder="Title">
            </div>
        </div>

        <div class="mb-4">
            <div class="form-group">
                <div class="block text-grey-darker text-sm font-bold mb-2">Block Number:</div>
                <input type="text" class="border rounded w-full py-2 px-3 text-grey-darker" name="block_number"
                    value="{{ $residentialUnit->block_number }}" class="form-control" placeholder="Title">
            </div>
        </div>

        <div class="mb-4">
            <div class="form-group">
                <div class="block text-grey-darker text-sm font-bold mb-2">Unit Number:</div>
                <input type="text" class="border rounded w-full py-2 px-3 text-grey-darker" name="unit_number"
                    value="{{ $residentialUnit->unit_number }}" class="form-control" placeholder="Title">
            </div>
        </div>

        <div class="mb-4">
            <div class="form-group">
                <div class="block text-grey-darker text-sm font-bold mb-2">Occupant Contact Number:</div>
                <input type="text" class="border rounded w-full py-2 px-3 text-grey-darker"
                    value="{{ $residentialUnit->occupant_contact }}" class="form-control" name="occupant_contact"
                    placeholder="Occupant Contact Number">
            </div>
        </div>

        <div class="mb-4">
            <button type="submit"
                class="w-full bg-blue-500 px-4 py-2 rounded text-gray-200 font-semibold hover:bg-blue-600 transition duration-200 each-in-out">Submit</button>
        </div>

    </form>
@endsection

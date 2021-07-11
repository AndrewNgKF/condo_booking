@extends('layouts.app')
@section('content')

    <div class="container mx-auto">

        <div class="pl-4 pt-2">
            <a class="text-gray-800 font-light" href="{{ route('residentialunits.index') }}">Back to Residential Units</a>
        </div>


        <div class="mx-16 py-4 text-black text-xl font-bold ">Add New Residential Unit
        </div>

        <div class="pull-right">

        </div>
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

    <form action="{{ route('residentialunits.store') }}" method="POST" class="mx-auto px-16">
        @csrf

        <div class="mb-4">
            <div class="form-group">
                <div class="block text-grey-darker text-sm font-bold mb-2">Occupant Name:</div>
                <input type="text" name="occupant_name" class="border rounded w-full py-2 px-3 text-grey-darker"
                    placeholder="Occupant Name">
            </div>
        </div>
        <div class="mb-4">
            <div class="form-group">
                <div class="block text-grey-darker text-sm font-bold mb-2">Block Number:</div>
                <input type="text" name="block_number" class="border rounded w-full py-2 px-3 text-grey-darker"
                    placeholder="Block Number">
            </div>
        </div>
        <div class="mb-4">
            <div class="form-group">
                <div class="block text-grey-darker text-sm font-bold mb-2">Unit Number:</div>
                <input type="text" name="unit_number" class="border rounded w-full py-2 px-3 text-grey-darker"
                    placeholder="Unit Number">
            </div>
        </div>
        <div class="mb-4">
            <div class="form-group">
                <div class="block text-grey-darker text-sm font-bold mb-2">Occupant Contact Number:</div>
                <input type="text" name="occupant_contact" class="border rounded w-full py-2 px-3 text-grey-darker"
                    placeholder="Occupant Contact Number">
            </div>
        </div>

        <div class="mb-4">
            <button type="submit"
                class="w-full bg-blue-500 px-4 py-2 rounded text-gray-200 font-semibold hover:bg-blue-600 transition duration-200 each-in-out">Submit</button>
        </div>



    </form>
@endsection

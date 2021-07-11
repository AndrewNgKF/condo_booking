@extends('layouts.app')

@section('content')

    <div class="text-center my-10">
        <a class="w-full bg-blue-500 px-4 py-2 rounded text-gray-200 font-semibold hover:bg-blue-600 transition duration-200 each-in-out"
            href="{{ route('visitors.create') }}">Log new Visit</a>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="">
        <form action="{{ route('visitors.index') }}" method="GET" role="search" class="mx-auto px-16">
            <input type="text" class="border rounded w-full py-2 px-3 text-grey-darker" name="query"
                placeholder="Search Visitor by last 3 Digits of NRIC or by Unit Number" id="query">
        </form>
    </div>
    @if (isset($visits))

        <table class="table table-bordered">
            <tr>
                <th
                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                    Visitor Name</th>
                <th
                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                    Visitor's NRIC (last 3 digits)</th>
                <th
                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                    Residence Visited (Block & Unit N.o)</th>
                <th
                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                    Time in</th>
                <th
                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                    Time out</th>
                <th
                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                    Resident Contact</th>
                <th width="280px">Action</th>
            </tr>

            @foreach ($visits as $visit)
                {{-- {{ $visit->id }} --}}
                {{-- {{ data_get($visit, 't-in-min') }} --}}
                <tr class="hover:bg-grey-lighter">

                    <td class="py-4 px-6 border-b border-grey-light">{{ $visit->visitor_name }}</td>
                    <td class="py-4 px-6 border-b border-grey-light">{{ $visit->NRICLast3Digits }}</td>
                    <td class="py-4 px-6 border-b border-grey-light">
                        {{ $visit->block_number . ' : ' . $visit->unit_number }}</td>
                    <td class="py-4 px-6 border-b border-grey-light">{{ $visit->created_at }}</td>
                    <td class="py-4 px-6 border-b border-grey-light">{{ $visit->exit_time ?? 'Not Signed Out' }}</td>
                    <td class="py-4 px-6 border-b border-grey-light">{{ $visit->occupant_contact }}</td>
                    <td class="py-4 px-6 border-b border-grey-light">
                        <a class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green-400 hover:bg-green-dark"
                            href="{{ route('visitors.edit', $visit->id) }}">Edit</a>
                        {{-- <form action="{{ route('residentialunits.destroy', $visit->id) }}" method="POST">

                            <a class="btn btn-info" href="{{ route('residentialunits.show', $visit->id) }}">Show</a>

                            <a class="btn btn-primary" href="{{ route('residentialunits.edit', $visit->id) }}">Edit</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form> --}}
                    </td>
                </tr>
            @endforeach
        </table>
    @else
        {{-- <h2>No entry found </h2> --}}
    @endif



@endsection

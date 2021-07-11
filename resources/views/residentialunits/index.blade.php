@extends('layouts.app')

@section('content')

    <div class="text-center my-10">
        <a class="w-full bg-blue-500 px-4 py-2 rounded text-gray-200 font-semibold hover:bg-blue-600 transition duration-200 each-in-out"
            href="{{ route('residentialunits.create') }}">Enter a New Residential Unit</a>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="w-2/3 mx-auto">
        <tr>
            {{-- <th>No</th> --}}
            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                Occupant Name</th>
            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                Block Number</th>
            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                Unit Number</th>
            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                Occupant Contact</th>
            <th width="280px"
                class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                Action</th>
        </tr>
        @foreach ($residentialunits as $unit)
            <tr class="hover:bg-grey-lighter">
                {{-- <td>{{ ++$i }}</td> --}}
                <td class="py-4 px-6 border-b border-grey-light">{{ $unit->occupant_name }}</td>
                <td class="py-4 px-6 border-b border-grey-light">{{ $unit->block_number }}</td>
                <td class="py-4 px-6 border-b border-grey-light">{{ $unit->unit_number }}</td>
                <td class="py-4 px-6 border-b border-grey-light">{{ $unit->occupant_contact }}</td>
                <td class="py-4 px-6 border-b border-grey-light">
                    <form action="{{ route('residentialunits.destroy', $unit->id) }}" method="POST">

                        {{-- <a class="btn btn-info" href="{{ route('residentialunits.show', $unit->id) }}">Show</a> --}}

                        <a class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green-400 hover:bg-green-dark"
                            href="{{ route('residentialunits.edit', $unit->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                            class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-red-400 hover:bg-red-dark">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {{-- {!! $products->links() !!} --}}

@endsection

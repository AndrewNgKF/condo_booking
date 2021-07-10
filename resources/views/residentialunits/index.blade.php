@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <a class="btn btn-success" href="{{ route('residentialunits.create') }}">Enter a new Residential Unit</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            {{-- <th>No</th> --}}
            <th>Occupant Name</th>
            <th>Block Number</th>
            <th>Unit Number</th>
            <th>Occupant Contact</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($residentialunits as $unit)
            <tr>
                {{-- <td>{{ ++$i }}</td> --}}
                <td>{{ $unit->occupant_name }}</td>
                <td>{{ $unit->block_number }}</td>
                <td>{{ $unit->unit_number }}</td>
                <td>{{ $unit->occupant_contact }}</td>
                <td>
                    <form action="{{ route('residentialunits.destroy', $unit->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('residentialunits.show', $unit->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('residentialunits.edit', $unit->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {{-- {!! $products->links() !!} --}}

@endsection

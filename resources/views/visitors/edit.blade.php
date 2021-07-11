@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="mx-16 py-4 px-8 text-black text-xl font-bold border-b border-grey-500">Edit Visit Details</div>
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

    <form action="{{ route('visitors.update', $visit->id) }}" method="POST" class="mx-auto px-16">
        @csrf

        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <div class="block text-grey-darker text-sm font-bold mb-2">Exit Date & Time: </div>
                    <input type="datetime-local" class="border rounded w-full py-2 px-3 text-grey-darker" name="exit_time"
                        value="{{ $visit->exit_date }}" class="form-control" placeholder="Sign out time">
                </div>
            </div>

            <div class="mt-4">
                <button type="submit"
                    class="w-full bg-blue-500 px-4 py-2 rounded text-gray-200 font-semibold hover:bg-blue-600 transition duration-200 each-in-out">Submit</button>
            </div>
        </div>
    </form>
@endsection

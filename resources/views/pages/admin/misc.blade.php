@extends("layouts.admin")
@section('title')
    Adminpanel - misc
@endsection
@section('content')
    <div class="text-success">
        @if (session('msg'))
            {{ session('msg') }}
        @endif
    </div>
    <div class="row">
        <div class="col-md-5">

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Cities</h4>
                    <a class="text-right pointer" href="{{ route('createcity') }}">Add</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>
                                    City
                                </th>
                                <th>
                                    Delete
                                </th>
                                <th>
                                    Edit
                                </th>

                            </thead>
                            <tbody>
                                @foreach ($cities as $city)
                                    <tr>
                                        <td>{{ $city->city }}</td>
                                        <td><a class="btn btn-warning" href="{{ route('editcity', $city->id) }}">Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('deletecity', $city->id) }}" method="POST">
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                @method("DELETE")
                                                @csrf
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Payment options</h4>
                    <a class="text-right pointer" href="{{ route('createpayment') }}">Add</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>
                                    City
                                </th>
                                <th>
                                    Delete
                                </th>
                                <th>
                                    Edit
                                </th>
                            </thead>
                            <tbody>
                                @foreach ($payments as $payment)
                                    <tr>
                                        <td>{{ $payment->payment }}</td>
                                        <td><a class="btn btn-warning"
                                                href="{{ route('editpayment', $payment->id) }}">Edit</a></td>
                                        <td>
                                            <form action="{{ route('deletepayment', $payment->id) }}" method="POST">
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                @method("DELETE")
                                                @csrf
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

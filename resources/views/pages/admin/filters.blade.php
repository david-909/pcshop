@extends("layouts.admin")
@section('title')
    Adminpanel - filter
@endsection
@section('content')
    <div class="text-success" id="msg">
        @if (session('msg'))
            {{ session('msg') }}
        @endif
    </div>
    <div class="row">
        <div class="col-md-12">
            <div id="filterValues"></div>
            <div id="originalFilters">
                <div class="card">
                    <div class="card-header">
                        <span class="card-title h4"> Filters</span>
                        <p><a class="text-right pointer" href="{{ route('createfilter') }}">Add</a></p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        Filter
                                    </th>
                                    <th>
                                        Delete
                                    </th>
                                    <th>
                                        Edit
                                    </th>
                                    <th>
                                        Values <small class="pull-right">Separate with |</small>
                                    </th>
                                    <th>

                                    </th>

                                </thead>
                                <tbody>
                                    @foreach ($filters as $filter)
                                        <tr>
                                            <td><button class="button-62 filterValuesButton" role="button"
                                                    data-id="{{ $filter->id }}">{{ $filter->filter }}</button>
                                            </td>
                                            <td><a class="btn btn-warning"
                                                    href="{{ route('editfilter', $filter->id) }}">Edit</a>
                                            </td>
                                            <td>
                                                <form action="{{ route('deletefilter', $filter->id) }}" method="POST">
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                    @method("DELETE")
                                                    @csrf
                                                </form>
                                            </td>
                                            <form action="{{ route('addfiltervalues', $filter->id) }}" method="POST">
                                                <td>
                                                    <input type="text" name="filtervalues" class="form-control"
                                                        placeholder="value|value">
                                                </td>
                                                <td>
                                                    <button type="submit" class="filter-btn">Add a value</button>
                                                </td>
                                                @csrf
                                            </form>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

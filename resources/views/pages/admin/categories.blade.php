@extends("layouts.admin")
@section('title')
    Adminpanel - categories
@endsection
@section('content')
    <div class="text-success" id="msg">
        @if (session('msg'))
            {{ session('msg') }}
        @endif

    </div>
    <div class="text-danger" id="err">
        @if (session('err'))
            {{ session('err') }}
        @endif

    </div>

    <div class="row">
        <div class="col-md-12">
            <div id="categoryFilters"></div>
            <div id="originalCategories">
                <div class="card">
                    <div class="card-header">
                        <span class="card-title h4"> Categories</span>
                        <p><a class="text-right pointer" href="{{ route('createcategory') }}">Add</a></p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        Category
                                    </th>
                                    <th>
                                        Edit
                                    </th>
                                    <th>
                                        Delete
                                    </th>
                                    <th>
                                        Available filters <small class="pull-right"></small>
                                    </th>
                                    <th>

                                    </th>


                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        {{-- @dd($category->unusedFilters) --}}
                                        <tr>
                                            <td><button class="button-62 categoryFiltersButton" role="button"
                                                    data-id="{{ $category->id }}">{{ $category->category }}</button>
                                            </td>
                                            <td><a class="btn btn-warning"
                                                    href=" {{ route('editcategory', $category->id) }} ">Edit</a>
                                            </td>
                                            <td>
                                                <form action=" {{ route('deletecategory', $category->id) }} "
                                                    method="POST">
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                    @method("DELETE")
                                                    @csrf
                                                </form>
                                            </td>
                                            <form action="{{ route('addcategoryfilters', $category->id) }} "
                                                method="POST">
                                                <td>
                                                    <select class="form-control" name="filter_id">
                                                        <option value="0">Choose a filter</option>
                                                        @foreach ($category->unusedFilters as $c)
                                                            <option value="{{ $c->id }}">{{ $c->filter }}</option>
                                                        @endforeach
                                                    </select>
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

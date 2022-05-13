@extends("layouts.admin")
@section('title')
    Adminpanel - payments
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <form action="{{ route('insertpayment') }}" method="POST">
                <div class="form-group">
                    <label for="payment" class="">Payment option:</label>
                    <input type="text" name="payment" id="payment" class="form-control">
                </div>
                <div class="form-group col-12">
                    <button type="submit" class="btn btn-block">Add</button>
                </div>
                @csrf
            </form>
        </div>
    </div>
@endsection

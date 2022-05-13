@extends("layouts.admin")
@section('title')
    Adminpanel - payments
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{ route('updatepayment', $payment->id) }}">
                <div class="form-group">
                    <label for="payment" class="">Payment:</label>
                    <input type="text" name="payment" id="payment" class="form-control" value="{{ $payment->payment }}">
                </div>
                <div class="form-group col-12">
                    <button type="submit" class="btn btn-block">Update</button>
                </div>
                @method("PUT")
                @csrf
            </form>
        </div>
    </div>
@endsection

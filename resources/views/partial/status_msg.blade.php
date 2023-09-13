@if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{!!  \Session::get('success') !!}</p>
            </div>
@endif
@if (\Session::has('update'))
            <div class="alert alert-succes">
                <p>{!!  \Session::get('update') !!}</p>
            </div>
@endif
@if (\Session::has('warning'))
            <div class="alert alert-warning">
                <p>{!!  \Session::get('warning') !!}</p>
            </div>
@endif
@if (\Session::has('error'))
            <div class="alert alert-danger">
                <p>{!!  \Session::get('error') !!}</p>
            </div>
@endif
@if (\Session::has('delete'))
            <div class="alert alert-danger">
                <p>{!!  \Session::get('delete') !!}</p>
            </div>
@endif
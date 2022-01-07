@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
<div class="header bg-gradient-primary py-7 py-lg-8">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-7">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-header bg-transparent pb-5">

                    </div>
                    <div class="card-body px-lg-10 py-lg-10">
                        <div class="text-center text-muted mb-4">
                            <small>
                                Create new vehicle record:
                            </small>
                        </div>
                        
                            @if (session('successMsg'))
                            <div class="alert alert-success" role="alert">
                                {{ session('successMsg') }}
                            </div>
                            @endif
                            
                            @if (session('errorMsg'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('errorMsg') }}
                            </div>

                            @endif
                        <form role="form" method="POST" action="{{ route('register_vehicle') }}">
                            @csrf

                            <div class="row">
                                <div class="form-group col">
                                    <label>Registration Number</label>
                                    <div class="input-group input-group-alternative">

                                        <input class="form-control" placeholder="{{ __('vehicle registration number') }}" type="text" name="vehicle_registration_number"  required autofocus>
                                    </div>
                                    @if ($errors->has('vehicle_registration_number'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('vehicle_registration_number') }}</strong>
                                    </span>
                                @endif
                                </div>
                                
                                <div class="form-group col">
                                    <label>Client Details</label>
                                    <div class="input-group input-group-alternative">
                                        <input class="form-control" name="client_details" placeholder="{{ __('Client Details') }}" type="text"  required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label>Vehicle Make</label>
                                    <div class="input-group input-group-alternative">
                                        <input class="form-control" name="vehicle_make" placeholder="{{ __('Vehicle Make') }}" type="text"  required>
                                    </div>
                                </div>
                                <div class="form-group col">
                                    <label>Vehicle Model</label>
                                    <div class="input-group input-group-alternative">
                                        <input class="form-control" name="vehicle_model" placeholder="{{ __('Vehicle Model') }}" type="text"  required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label>Chassis Number</label>
                                    <div class="input-group input-group-alternative">
                                        <input class="form-control" name="chassis_number" placeholder="{{ __('Chassis Number') }}" type="text"  required>
                                    </div>
                                </div>
                                <div class="form-group col">
                                    <label>Engine Number</label>
                                    <div class="input-group input-group-alternative">
                                        <input class="form-control" name="engine_number" placeholder="{{ __('Engine Number') }}" type="text"  required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label>Color</label>
                                    <div class="input-group input-group-alternative">
                                        <input class="form-control" name="color" placeholder="{{ __('Color') }}" type="text"  required>
                                    </div>
                                </div>
                                <div class="form-group col">
                                    <label>Serial Number</label>
                                    <div class="input-group input-group-alternative">
                                        <input class="form-control" name="serial_number" placeholder="{{ __('Serial Number') }}" type="text"  required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label>Installation Date</label>
                                    <div class="input-group input-group-alternative">
                                        <input class="form-control" name="date" placeholder="{{ __('Installation Date') }}" type="date"  required>
                                    </div>
                                </div>
                                <div class="form-group col">
                                    <label>Expiry Date</label>
                                    <div class="input-group input-group-alternative">
                                        <input class="form-control" name="expiry_date" placeholder="{{ __('Expiry Date') }}" type="text"  required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                    <label>Other Interests</label>
                                    <div class="input-group input-group-alternative">
                                        <input class="form-control" name="other_interest" placeholder="{{ __('Other Interests') }}" type="text"  required>
                                    </div>
                                </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary my-4">{{ __('CREATE') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
            <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
    </div>
</div>

<div class="container mt--10 pb-5"></div>
@endsection

@push('js')
<script>
    @if(\Illuminate\Support\Facades\Session::has('message'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.success("{{ session('message') }}");
    @endif

</script>
@endpush



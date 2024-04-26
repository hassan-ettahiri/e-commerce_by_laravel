@extends('layouts.admin')

@section('content')
<!-- Checkout-Page -->
<div class="card">
    <div class="card-header">
        @if ($user->role_as == 1)
            <h1>admin</h1>
        @else
            <h1>user</h1>
        @endif
        
        <hr>
    </div>
    <div class="card-body">
        <!-- Form-Fields -->
        <div class="row">
            <div class="col-md-6">
                <label for="first-name">First Name
                </label>
                <p>{{ $user->name }}</p>
            </div>
            <div class="col-md-6">
                <label for="last-name">Last Name
                </label>
                <p>{{ $user->lname }}</p>
            </div>
        </div>
        <div>
            <label for="select-country">Company
            </label>
            @if($user->company == NULL)
                <p>________</p>
            @else
                <p>{{ $user->company }}</p>
            @endif
        </div>
        <div>
            <label for="req-st-address">Address
            </label>
            <p>{{ $user->address }}</p>    
        </div>
        <div>
            <label for="town-city">apartment, suite, etc. 
            </label>
            @if($user->apartment == NULL)
                <p>________</p>
            @else
                <p>{{ $user->apartment }}</p>
            @endif
        </div>
        <div class="row">
            <div class="col-md-4">
                <label for="email">Zip code: 
                </label>
                <p>{{ $user->zip }}</p>    
            </div>
            <div class="col-md-4">
                <label for="phone">City:
                </label>
                <p>{{ $user->city }}</p>
            </div>
            <div class="col-md-4">
                <label for="phone">state:
                </label>
                <p>{{ $user->state }}</p>
            </div>
        </div>
        <div>
            <label for="postcode">Country:
            </label>
            <p>{{ $user->country }}</p>
            </div>
            <div>
                <label for="postcode">Phone number:
                </label>
                <p>{{ $user->phone }}</p>    
            </div>
        </div>
    </div>
</div>
@endsection
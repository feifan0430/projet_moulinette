@extends('layouts.moulinette')
@section('content')
    <div class="container">
        @if ($toShow == 'UpdateForm')
            <div class="row">
                <form style="width: 35%; padding: 15px; margin: auto;" action="{{ route('updatePassword') }}" method="POST">
                    {{ csrf_field() }}
                    <h3 class="h3 mb-3 fw-normal">
                        Reset Your Password
                    </h1>
                    <div class="form-floating" style="margin-bottom: 3%">
                        <input type="password" class="form-control" name="oldPassword" id="oldPassword" placeholder="Password">
                        <label for="floatingPassword">
                            Old Password
                        </label>
                    </div>
                    <div class="form-floating" style="margin-bottom: 3%">
                        <input type="password" class="form-control" name="newPassword" id="newPassword" placeholder="Password">
                        <label for="floatingPassword">
                            New Password
                        </label>
                    </div>
                    <div class="form-floating" style="margin-bottom: 3%">
                        <input type="password" class="form-control" name="confirmNewPassword" id="confirmNewPassword" placeholder="Password">
                        <label for="floatingPassword">
                            Confirm New Password
                        </label>
                    </div>
                
                    <button class="w-100 btn btn-lg btn-primary" type="submit" onclick="">
                        Confirm
                    </button>
                </form>
            </div>
        @endif

        @if ($toShow == 'WrongOldPassword')
            <div class="row" style="margin-bottom: 5%; margin-top: 10%">
                <h2 style="text-align: center">
                    Wrong Old PassWord!
                </h2>
            </div>
            <div class="row">
                <form action="{{ route('showUpdatePasswordPage') }}" method="GET" style="padding: 15px; margin: auto; width: 35%">
                    {{ csrf_field() }}
                    <button class="w-100 btn btn-lg btn-primary" type="submit" onclick="">
                        Continue
                    </button>
                </form>
            </div>
        @endif

        @if ($toShow == 'WrongConfirmPassword')
            <div class="row" style="margin-bottom: 5%; margin-top: 10%">
                <h2 style="text-align: center">
                    Wrong Confirm Password!
                </h2>
            </div>
            <div class="row">
                <form action="{{ route('showUpdatePasswordPage') }}" method="GET" style="padding: 15px; margin: auto; width: 35%">
                    {{ csrf_field() }}
                    <button class="w-100 btn btn-lg btn-primary" type="submit" onclick="">
                        Continue
                    </button>
                </form>
            </div>
        @endif

        @if ($toShow == 'SameNewPassword')
            <div class="row" style="margin-bottom: 5%; margin-top: 10%">
                <h2 style="text-align: center">
                    Same New Password!
                </h2>
            </div>
            <div class="row">
                <form action="{{ route('showUpdatePasswordPage') }}" method="GET" style="padding: 15px; margin: auto; width: 35%">
                    {{ csrf_field() }}
                    <button class="w-100 btn btn-lg btn-primary" type="submit" onclick="">
                        Continue
                    </button>
                </form>
            </div>
        @endif

        @if ($toShow == 'SuccessfullyUpdated')
            <div class="row" style="margin-bottom: 5%; margin-top: 10%">
                <h2 style="text-align: center">
                    Successfully Updated!
                </h2>
            </div>
            <div class="row">
                <form action="{{ route('showUpdatePasswordPage') }}" method="GET" style="padding: 15px; margin: auto; width: 35%">
                    {{ csrf_field() }}
                    <button class="w-100 btn btn-lg btn-primary" type="submit" onclick="">
                        Continue
                    </button>
                </form>
            </div>
        @endif
    </div>

@endsection
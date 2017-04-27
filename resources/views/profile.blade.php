@extends('layouts.master')

@section('content')
<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading">Update your User Profile</div>
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('profile.display') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="displayName" class="col-md-4 control-label">Display Name</label>

                    <div class="col-md-6">
                        <input type="text" id="displayName" class="form-control" name="display_name" maxlength="2" value="{{ $user->display_name }}">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-btn fa-pencil"></i> Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@extends(backpack_view('blank'))

@section('after_styles')
    <style media="screen">
        .backpack-profile-form .required::after {
            content: ' *';
            color: red;
        }
    </style>
@endsection

@php
    $breadcrumbs = [
        trans('backpack::crud.admin') => url(config('backpack.base.route_prefix'), 'dashboard'),
        trans('backpack::base.my_account') => false,
    ];

@endphp

@section('header')
    <section class="content-header">
        <div class="container-fluid mb-3">
            <h1>{{ trans('backpack::base.my_account') }}</h1>
        </div>
    </section>
@endsection

@section('content')
    <div class="row">

        @if (session('success'))
            <div class="col-lg-8">
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            </div>
        @endif

        @if ($errors->count())
            <div class="col-lg-8">
                <div class="alert alert-danger">
                    <ul class="mb-1">
                        @foreach ($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        {{-- UPDATE INFO FORM --}}
        <div class="col-lg-8">
            <form class="form" action="{{ route('backpack.account.info.store') }}" method="post">

                {!! csrf_field() !!}

                <div class="card padding-10">

                    <div class="card-header">
                        {{ trans('backpack::base.update_account_info') }}
                    </div>

                    <div class="card-body backpack-profile-form bold-labels">
                        @if (backpack_user()->hasRole('admin') || backpack_user()->hasRole('organization'))
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    @php
                                        $label = trans('backpack::base.name');
                                        $field = 'name';
                                    @endphp
                                    <label class="required">{{ $label }}</label>
                                    <input required class="form-control" type="text" name="{{ $field }}"
                                           value="{{ old($field) ? old($field) : $user->$field }}">
                                </div>

                                <div class="col-md-6 form-group">
                                    @php
                                        $label = config('backpack.base.authentication_column_name');
                                        $field = backpack_authentication_column();
                                    @endphp
                                    <label class="required">{{ $label }}</label>
                                    <input required class="form-control"
                                           type="{{ backpack_authentication_column()==backpack_email_column()?'email':'numeric' }}"
                                           name="{{ $field }}" value="{{ old($field) ? old($field) : $user->$field }}">
                                </div>
                            </div>
                        @endif
                        @if(backpack_user()->hasRole('organization'))
                            <div class="row">

                                <div class="col-md-6 form-group">
                                    @php
                                        $label = 'Email';
                                        $field = 'email';
                                    @endphp
                                    <label class="required">{{ $label }}</label>
                                    <input required class="form-control" type="email" name="{{ $field }}"
                                           value="{{ old($field) ? old($field) : backpack_user()->organizations->$field }}">
                                </div>

                                <div class="col-md-6 form-group">
                                    @php
                                        $label = 'Website';
                                        $field = 'website';
                                    @endphp
                                    <label>{{ $label }}</label>
                                    <input class="form-control" type="url" name="{{ $field }}"
                                           value="{{ old($field) ? old($field) : backpack_user()->organizations->$field }}">

                                </div>
                            </div>
                        @endif

                        @if (backpack_user()->hasRole('donor'))
                            <div class="row">
                                <div class="col-md-4 form-group">
                                    @php
                                        $label = 'First Name';
                                        $field = 'name';
                                    @endphp
                                    <label class="required">{{ $label }}</label>
                                    <input required class="form-control" type="text" name="{{ $field }}"
                                           value="{{ old($field) ? old($field) : backpack_user()->$field }}">
                                </div>

                                <div class="col-md-4 form-group">
                                    @php
                                        $label = 'Middle Name';
                                        $field = 'mname';
                                    @endphp
                                    <label>{{ $label }}</label>
                                    <input class="form-control" type="text" name="{{ $field }}"
                                           value="{{ old($field) ? old($field) : backpack_user()->donors->$field }}">
                                </div>

                                <div class="col-md-4 form-group">
                                    @php
                                        $label = 'Last Name';
                                        $field = 'lname';
                                    @endphp
                                    <label class="required">{{ $label }}</label>
                                    <input required class="form-control" type="text" name="{{ $field }}"
                                           value="{{ old($field) ? old($field) : backpack_user()->donors->$field }}">
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6 form-group">
                                    @php
                                        $label = config('backpack.base.authentication_column_name');
                                        $field = backpack_authentication_column();
                                    @endphp
                                    <label class="required">{{ $label }}</label>
                                    <input required class="form-control"
                                           type="{{ backpack_authentication_column()==backpack_email_column()?'email':'numeric' }}"
                                           name="{{ $field }}"
                                           value="{{ old($field) ? old($field) : $user->$field }}">
                                </div>

                                <div class="col-md-6 form-group">
                                    @php
                                        $label = 'Email';
                                        $field = 'email';
                                    @endphp
                                    <label class="required">{{ $label }}</label>
                                    <input required class="form-control" type="email" name="{{ $field }}"
                                           value="{{ old($field) ? old($field) : backpack_user()->donors->$field }}">
                                </div>
                            </div>
                        @endif
                    </div>


                    <div class="card-footer">
                        <button type="submit" class="btn btn-success"><i
                                class="la la-save"></i> {{ trans('backpack::base.save') }}</button>
                        <a href="{{ backpack_url() }}" class="btn">{{ trans('backpack::base.cancel') }}</a>
                    </div>
                </div>

            </form>
        </div>

        {{-- CHANGE PASSWORD FORM --}}
        @if(backpack_user()->hasRole('organization') || backpack_user()->hasRole('admin'))
            <div class="col-lg-8">
                <form class="form" action="{{ route('backpack.account.password') }}" method="post">

                    {!! csrf_field() !!}

                    <div class="card padding-10">

                        <div class="card-header">
                            {{ trans('backpack::base.change_password') }}
                        </div>

                        <div class="card-body backpack-profile-form bold-labels">
                            <div class="row">
                                <div class="col-md-4 form-group">
                                    @php
                                        $label = trans('backpack::base.old_password');
                                        $field = 'old_password';
                                    @endphp
                                    <label class="required">{{ $label }}</label>
                                    <input autocomplete="new-password" required class="form-control" type="password"
                                           name="{{ $field }}" id="{{ $field }}" value="">
                                </div>

                                <div class="col-md-4 form-group">
                                    @php
                                        $label = trans('backpack::base.new_password');
                                        $field = 'new_password';
                                    @endphp
                                    <label class="required">{{ $label }}</label>
                                    <input autocomplete="new-password" required class="form-control" type="password"
                                           name="{{ $field }}" id="{{ $field }}" value="">
                                </div>

                                <div class="col-md-4 form-group">
                                    @php
                                        $label = trans('backpack::base.confirm_password');
                                        $field = 'confirm_password';
                                    @endphp
                                    <label class="required">{{ $label }}</label>
                                    <input autocomplete="new-password" required class="form-control" type="password"
                                           name="{{ $field }}" id="{{ $field }}" value="">
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success"><i
                                    class="la la-save"></i> {{ trans('backpack::base.change_password') }}</button>
                            <a href="{{ backpack_url() }}" class="btn">{{ trans('backpack::base.cancel') }}</a>
                        </div>

                    </div>

                </form>
            </div>
        @endif
    </div>
@endsection
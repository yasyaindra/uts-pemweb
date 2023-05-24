@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.beasiswa.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.beasiswa.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="name">{{ trans('cruds.beasiswa.fields.name') }}</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                        id="name" value="{{ old('name', '') }}" required>
                    @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.beasiswa.fields.bookname_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="nominal">{{ trans('cruds.beasiswa.fields.nominal') }}</label>
                    <input class="form-control {{ $errors->has('nominal') ? 'is-invalid' : '' }}" type="text"
                        name="nominal" id="nominal" value="{{ old('nominal', '') }}" required>
                    @if ($errors->has('nominal'))
                        <div class="invalid-feedback">
                            {{ $errors->first('nominal') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.beasiswa.fields.author_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="contact">{{ trans('cruds.beasiswa.fields.contact') }}</label>
                    <input class="form-control {{ $errors->has('contact') ? 'is-invalid' : '' }}" type="text"
                        name="contact" id="contact" value="{{ old('contact', '') }}" required>
                    @if ($errors->has('contact'))
                        <div class="invalid-feedback">
                            {{ $errors->first('contact') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.beasiswa.fields.author_helper') }}</span>
                </div>
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.beasiswa.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.beasiswa.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                {{ trans('cruds.beasiswa.fields.id') }}
                            </th>
                            <td>
                                {{ $beasiswa->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.beasiswa.fields.bookname') }}
                            </th>
                            <td>
                                {{ $beasiswa->bookname }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.beasiswa.fields.author') }}
                            </th>
                            <td>
                                {{ $beasiswa->author }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.beasiswa.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

<?php

namespace App\Http\Controllers\Admin;

use Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBookRequest;
use App\Http\Requests\StoreBeasiswaRequest;
use App\Http\Requests\UpdateBeasiswaRequest;
use App\Models\Beasiswa;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class BeasiswaController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('book_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Beasiswa::query()->select(sprintf('%s.*', (new beasiswa)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'book_show';
                $editGate      = 'book_edit';
                $deleteGate    = 'book_delete';
                $crudRoutePart = 'books';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('bookname', function ($row) {
                return $row->bookname ? $row->bookname : '';
            });
            $table->editColumn('author', function ($row) {
                return $row->author ? $row->author : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.books.index');
    }

    public function create()
    {
        abort_if(Gate::denies('book_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.books.create');
    }

    public function store(StoreBookRequest $request)
    {
        $beasiswa = Beasiswa::create($request->all());

        return redirect()->route('admin.books.index');
    }

    public function edit(beasiswa $beasiswa)
    {
        abort_if(Gate::denies('book_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.books.edit', compact('beasiswa'));
    }

    public function update(UpdateBookRequest $request, beasiswa $beasiswa)
    {
        $beasiswa->update($request->all());

        return redirect()->route('admin.books.index');
    }

    public function show(beasiswa $beasiswa)
    {
        abort_if(Gate::denies('book_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.books.show', compact('beasiswa'));
    }

    public function destroy(beasiswa $beasiswa)
    {
        abort_if(Gate::denies('book_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $beasiswa->delete();

        return back();
    }

    public function massDestroy(MassDestroyBookRequest $request)
    {
        $books = Beasiswa::find(request('ids'));

        foreach ($books as $beasiswa) {
            $beasiswa->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\CreateTypeSparePartRequest;
use App\Http\Requests\Backend\UpdateTypeSparePartRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Backend\TypeSparePart;
use Illuminate\Http\Request;
use Flash;
use Response;

class TypeSparePartController extends AppBaseController
{
    /**
     * Display a listing of the TypeSparePart.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var TypeSparePart $typeSpareParts */
        $typeSpareParts = TypeSparePart::paginate(5);

        return view('backend.type_spare_parts.index')
            ->with('typeSpareParts', $typeSpareParts);
    }

    /**
     * Show the form for creating a new TypeSparePart.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.type_spare_parts.create');
    }

    /**
     * Store a newly created TypeSparePart in storage.
     *
     * @param CreateTypeSparePartRequest $request
     *
     * @return Response
     */
    public function store(CreateTypeSparePartRequest $request)
    {
        $input = $request->all();

        try {
            /** @var TypeSparePart $typeSparePart */
            $typeSparePart = TypeSparePart::create($input);
        } catch (\Throwable $th) {
            Flash::error('El nombre de tipo de repuesto ya existe');
            return redirect(route('admin.typeSpareParts.index'));
        }

        Flash::success('Type Spare Part saved successfully.');

        return redirect(route('admin.typeSpareParts.index'));
    }

    /**
     * Display the specified TypeSparePart.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var TypeSparePart $typeSparePart */
        $typeSparePart = TypeSparePart::find($id);

        if (empty($typeSparePart)) {
            Flash::error('Type Spare Part not found');

            return redirect(route('admin.typeSpareParts.index'));
        }

        return view('backend.type_spare_parts.show')->with('typeSparePart', $typeSparePart);
    }

    /**
     * Show the form for editing the specified TypeSparePart.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var TypeSparePart $typeSparePart */
        $typeSparePart = TypeSparePart::find($id);

        if (empty($typeSparePart)) {
            Flash::error('Type Spare Part not found');

            return redirect(route('admin.typeSpareParts.index'));
        }

        return view('backend.type_spare_parts.edit')->with('typeSparePart', $typeSparePart);
    }

    /**
     * Update the specified TypeSparePart in storage.
     *
     * @param int $id
     * @param UpdateTypeSparePartRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTypeSparePartRequest $request)
    {
        /** @var TypeSparePart $typeSparePart */
        $typeSparePart = TypeSparePart::find($id);

        if (empty($typeSparePart)) {
            Flash::error('Type Spare Part not found');

            return redirect(route('admin.typeSpareParts.index'));
        }

        $typeSparePart->fill($request->all());
        $typeSparePart->save();

        Flash::success('Type Spare Part updated successfully.');

        return redirect(route('admin.typeSpareParts.index'));
    }

    /**
     * Remove the specified TypeSparePart from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var TypeSparePart $typeSparePart */
        $typeSparePart = TypeSparePart::find($id);

        if (empty($typeSparePart)) {
            Flash::error('Type Spare Part not found');

            return redirect(route('admin.typeSpareParts.index'));
        }

        $typeSparePart->delete();

        Flash::success('Type Spare Part deleted successfully.');

        return redirect(route('admin.typeSpareParts.index'));
    }
}

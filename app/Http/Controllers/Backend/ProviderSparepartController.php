<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\CreateProviderSparepartRequest;
use App\Http\Requests\Backend\UpdateProviderSparepartRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Backend\ProviderSparepart;
use App\Models\Backend\Provider;
use App\Models\Backend\SparePart;
use Illuminate\Http\Request;
use Flash;
use Response;

class ProviderSparepartController extends AppBaseController
{
    /**
     * Display a listing of the ProviderSparepart.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var ProviderSparepart $providerSpareparts */
        $providerSpareparts = ProviderSparepart::paginate(5);

        return view('backend.provider_spareparts.index')
            ->with('providerSpareparts', $providerSpareparts);
    }

    /**
     * Show the form for creating a new ProviderSparepart.
     *
     * @return Response
     */
    public function create()
    {
        $providers = Provider::pluck('name', 'id');
        $spareParts = SparePart::pluck('name', 'id');

        return view('backend.provider_spareparts.create')->with(compact('providers', 'spareParts'));
    }

    /**
     * Store a newly created ProviderSparepart in storage.
     *
     * @param CreateProviderSparepartRequest $request
     *
     * @return Response
     */
    public function store(CreateProviderSparepartRequest $request)
    {
        $input = $request->all();

        $repeat = ProviderSparepart::where('provider_id', $request->provider_id)
        ->where('spare_part_id', $request->spare_part_id)
        ->get();

        if(count($repeat)>0) {
            Flash::error('El prooveedor ya esta asociado con este repuesto o insumo');
            return redirect(route('admin.providerSpareparts.index'));
        }

        /** @var ProviderSparepart $providerSparepart */
        $providerSparepart = ProviderSparepart::create($input);

        Flash::success('Se ha guardado exitosamente.');

        return redirect(route('admin.providerSpareparts.index'));
    }

    /**
     * Display the specified ProviderSparepart.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ProviderSparepart $providerSparepart */
        $providerSparepart = ProviderSparepart::find($id);

        if (empty($providerSparepart)) {
            Flash::error('No se encuentra proovedor con su repuesto o insumo');

            return redirect(route('admin.providerSpareparts.index'));
        }

        return view('backend.provider_spareparts.show')->with('providerSparepart', $providerSparepart);
    }

    /**
     * Show the form for editing the specified ProviderSparepart.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $providers = Provider::pluck('name', 'id');
        $spareParts = SparePart::pluck('name', 'id');

        /** @var ProviderSparepart $providerSparepart */
        $providerSparepart = ProviderSparepart::find($id);

        if (empty($providerSparepart)) {
            Flash::error('No se encuentra el proveedor con su repuesto o insumo');

            return redirect(route('admin.providerSpareparts.index'));
        }

        return view('backend.provider_spareparts.edit')->with(compact('providerSparepart', 'providers', 'spareParts'));
    }

    /**
     * Update the specified ProviderSparepart in storage.
     *
     * @param int $id
     * @param UpdateProviderSparepartRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProviderSparepartRequest $request)
    {
        /** @var ProviderSparepart $providerSparepart */
        $providerSparepart = ProviderSparepart::find($id);

        if (empty($providerSparepart)) {
            Flash::error('No se encuentra el proveedor con su repuesto o insumo');

            return redirect(route('admin.providerSpareparts.index'));
        }

        $repeat = ProviderSparepart::where('provider_id', $request->provider_id)
        ->where('spare_part_id', $request->spare_part_id)
        ->get();

        if(count($repeat)>0) {
            Flash::error('El prooveedor ya esta asociado con este repuesto o insumo');
            return redirect(route('admin.providerSpareparts.index'));
        }

        $providerSparepart->fill($request->all());
        $providerSparepart->save();

        Flash::success('Provider Sparepart updated successfully.');

        return redirect(route('admin.providerSpareparts.index'));
    }

    /**
     * Remove the specified ProviderSparepart from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ProviderSparepart $providerSparepart */
        $providerSparepart = ProviderSparepart::find($id);

        if (empty($providerSparepart)) {
            Flash::error('no se encuentra el proveedor con su repuesto o insumo');

            return redirect(route('admin.providerSpareparts.index'));
        }

        // $providerSparepart->delete();

        $providerSparepart = ProviderSparepart::find($id);
        $providerSparepart->forceDelete();

        Flash::success('Se ha eliminado exitosamente.');

        return redirect(route('admin.providerSpareparts.index'));
    }
}

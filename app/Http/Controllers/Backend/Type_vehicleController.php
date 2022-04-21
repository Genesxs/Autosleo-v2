<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\CreateType_vehicleRequest;
use App\Http\Requests\Backend\UpdateType_vehicleRequest;
use App\Repositories\Backend\Type_vehicleRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class Type_vehicleController extends AppBaseController
{
    /** @var  Type_vehicleRepository */
    private $typeVehicleRepository;

    public function __construct(Type_vehicleRepository $typeVehicleRepo)
    {
        $this->typeVehicleRepository = $typeVehicleRepo;
    }

    /**
     * Display a listing of the Type_vehicle.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $typeVehicles = $this->typeVehicleRepository->all();

        return view('backend.type_vehicles.index')
            ->with('typeVehicles', $typeVehicles);
    }

    /**
     * Show the form for creating a new Type_vehicle.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.type_vehicles.create');
    }

    /**
     * Store a newly created Type_vehicle in storage.
     *
     * @param CreateType_vehicleRequest $request
     *
     * @return Response
     */
    public function store(CreateType_vehicleRequest $request)
    {
        $input = $request->all();

        $typeVehicle = $this->typeVehicleRepository->create($input);

        Flash::success('Type Vehicle saved successfully.');

        return redirect(route('admin.typeVehicles.index'));
    }

    /**
     * Display the specified Type_vehicle.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $typeVehicle = $this->typeVehicleRepository->find($id);

        if (empty($typeVehicle)) {
            Flash::error('Type Vehicle not found');

            return redirect(route('admin.typeVehicles.index'));
        }

        return view('backend.type_vehicles.show')->with('typeVehicle', $typeVehicle);
    }

    /**
     * Show the form for editing the specified Type_vehicle.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $typeVehicle = $this->typeVehicleRepository->find($id);

        if (empty($typeVehicle)) {
            Flash::error('Type Vehicle not found');

            return redirect(route('admin.typeVehicles.index'));
        }

        return view('backend.type_vehicles.edit')->with('typeVehicle', $typeVehicle);
    }

    /**
     * Update the specified Type_vehicle in storage.
     *
     * @param int $id
     * @param UpdateType_vehicleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateType_vehicleRequest $request)
    {
        $typeVehicle = $this->typeVehicleRepository->find($id);

        if (empty($typeVehicle)) {
            Flash::error('Type Vehicle not found');

            return redirect(route('admin.typeVehicles.index'));
        }

        $typeVehicle = $this->typeVehicleRepository->update($request->all(), $id);

        Flash::success('Type Vehicle updated successfully.');

        return redirect(route('admin.typeVehicles.index'));
    }

    /**
     * Remove the specified Type_vehicle from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $typeVehicle = $this->typeVehicleRepository->find($id);

        if (empty($typeVehicle)) {
            Flash::error('Type Vehicle not found');

            return redirect(route('admin.typeVehicles.index'));
        }

        $this->typeVehicleRepository->delete($id);

        Flash::success('Type Vehicle deleted successfully.');

        return redirect(route('admin.typeVehicles.index'));
    }
}

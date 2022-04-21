<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\CreateServiceRequest;
use App\Http\Requests\Backend\UpdateServiceRequest;
use App\Repositories\Backend\ServiceRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Backend\Service;
use App\Models\Backend\TypeService;
use Illuminate\Http\Request;
use Flash;
use Response;

class ServiceController extends AppBaseController
{
    /** @var  ServiceRepository */
    private $serviceRepository;

    public function __construct(ServiceRepository $serviceRepo)
    {
        $this->serviceRepository = $serviceRepo;
    }

    /**
     * Display a listing of the Service.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $services = $this->serviceRepository->paginate(5);

        return view('backend.services.index')
            ->with('services', $services);
    }

    /**
     * Show the form for creating a new Service.
     *
     * @return Response
     */
    public function create()
    {
        $typeService = TypeService::pluck('name','id');

        return view('backend.services.create')->with(compact('typeService'));
    }

    /**
     * Store a newly created Service in storage.
     *
     * @param CreateServiceRequest $request
     *
     * @return Response
     */
    public function store(CreateServiceRequest $request)
    {
        $input = $request->all();

        $service = $this->serviceRepository->create($input);

        Flash::success('Se guardo el servicio exitosamente.');

        return redirect(route('admin.services.index'));
    }

    /**
     * Display the specified Service.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $service = $this->serviceRepository->find($id);

        if (empty($service)) {
            Flash::error('No se encuentra el servicio');

            return redirect(route('admin.services.index'));
        }

        return view('backend.services.show')->with('service', $service);
    }

    public function showService()
    {
        $services = $this->serviceRepository->paginate('10');

        return view('servicios')
            ->with('services', $services);
    }

    /**
     * Show the form for editing the specified Service.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $typeService = TypeService::pluck('name', 'id');

        $service = $this->serviceRepository->find($id);

        if (empty($service)) {
            Flash::error('No se encuentra el servicio');

            return redirect(route('admin.services.index'));
        }

        return view('backend.services.edit')->with(compact('typeService', 'service'));
    }

    /**
     * Update the specified Service in storage.
     *
     * @param int $id
     * @param UpdateServiceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateServiceRequest $request)
    {
        $service = $this->serviceRepository->find($id);

        if (empty($service)) {
            Flash::error('No se encuentra el servicio');

            return redirect(route('admin.services.index'));
        }

        $service = $this->serviceRepository->update($request->all(), $id);

        Flash::success('El servicio se ha actualizado exitosamente.');

        return redirect(route('admin.services.index'));
    }

    /**
     * Remove the specified Service from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $service = $this->serviceRepository->find($id);

        if (empty($service)) {
            Flash::error('No se encunentra el servicio');

            return redirect(route('admin.services.index'));
        }

        // $this->serviceRepository->delete($id);

        $service = Service::find($id);
        $service->forceDelete();

        Flash::success('El servicio se ha eliminado exitosamente.');

        return redirect(route('admin.services.index'));
    }
}

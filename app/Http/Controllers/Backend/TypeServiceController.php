<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\CreateTypeServiceRequest;
use App\Http\Requests\Backend\UpdateTypeServiceRequest;
use App\Repositories\Backend\TypeServiceRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Backend\TypeService;
use Illuminate\Http\Request;
use Flash;
use Response;

class TypeServiceController extends AppBaseController
{
    /** @var  TypeServiceRepository */
    private $typeServiceRepository;

    public function __construct(TypeServiceRepository $typeServiceRepo)
    {
        $this->typeServiceRepository = $typeServiceRepo;
    }

    /**
     * Display a listing of the TypeService.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $typeServices = $this->typeServiceRepository->paginate(5);

        return view('backend.type_services.index')
            ->with('typeServices', $typeServices);
    }

    /**
     * Show the form for creating a new TypeService.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.type_services.create');
    }

    /**
     * Store a newly created TypeService in storage.
     *
     * @param CreateTypeServiceRequest $request
     *
     * @return Response
     */
    public function store(CreateTypeServiceRequest $request)
    {
        $input = $request->all();

        try {
            $typeService = $this->typeServiceRepository->create($input);
        } catch (\Throwable $th) {
            Flash::error('Ya existe un tipo de servicio con ese nombre');
            return redirect(route('admin.typeServices.index'));
        }
        

        Flash::success('El tipo de servicio se ha creado exitosamente');

        return redirect(route('admin.typeServices.index'));
    }

    /**
     * Display the specified TypeService.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $typeService = $this->typeServiceRepository->find($id);

        if (empty($typeService)) {
            Flash::error('El tipo de servicio no se encuentra.');

            return redirect(route('admin.typeServices.index'));
        }

        return view('backend.type_services.show')->with('typeService', $typeService);
    }

    /**
     * Show the form for editing the specified TypeService.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $typeService = $this->typeServiceRepository->find($id);

        if (empty($typeService)) {
            Flash::error('El tipo de servicio no se encuentra.');

            return redirect(route('admin.typeServices.index'));
        }

        return view('backend.type_services.edit')->with('typeService', $typeService);
    }

    /**
     * Update the specified TypeService in storage.
     *
     * @param int $id
     * @param UpdateTypeServiceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTypeServiceRequest $request)
    {
        $typeService = $this->typeServiceRepository->find($id);

        if (empty($typeService)) {
            Flash::error('El tipo de servicio no se encuentra.');

            return redirect(route('admin.typeServices.index'));
        }

        try {
            $typeService = $this->typeServiceRepository->update($request->all(), $id);
        } catch (\Throwable $th) {
            Flash::error('Ya existe un tipo de servicio con ese nombre');
            return redirect(route('admin.typeServices.index'));
        }
        
        Flash::success('El tipo de servicio se ha actualizado exitosamente.');

        return redirect(route('admin.typeServices.index'));
    }

    /**
     * Remove the specified TypeService from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $typeService = $this->typeServiceRepository->find($id);

        if (empty($typeService)) {
            Flash::error('Tipo de servicio no se encuentra.');

            return redirect(route('admin.typeServices.index'));
        }

        // Before of delete, verify that the type services not have associateds services.
        $resultQueriesOne = TypeService::select('type_services.id', 'services.description')
            ->LeftJoin('services', 'type_services.id', '=', 'services.type_service_id')
            ->where('type_services.id', '=', $id)
            ->get();

        

        if (count($resultQueriesOne) > 0) {
            $erase = false;
            foreach ($resultQueriesOne as $resultQuerie) {
                if ($resultQuerie->description != null) {
                    $erase = true;
                    break;
                }
            }

            if ($erase == true) {
                Flash::error('El tipo de servicio no se puede eliminar, porque posee servicios asociados.');
                return redirect(route('admin.typeServices.index'));
            }

            $type_service = TypeService::find($id);
            $type_service->forceDelete();   // physical delete.

            Flash::success('Tipo de servicio se ha eliminado exitosamente.');
            return redirect(route('admin.typeServices.index'));
        }

       //  $this->typeServiceRepository->delete($id);

       Flash::error('Tipo de servicio no se encuentra.');

       return redirect(route('admin.typeServices.index'));
    }
}

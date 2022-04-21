<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\CreateSparePartRequest;
use App\Http\Requests\Backend\UpdateSparePartRequest;
use App\Repositories\Backend\SparePartRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Backend\TypeSparePart;
use App\Models\Backend\Provider;
use App\Models\Backend\SparePart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;  // Para subir el fichero al disk 'images'
use Illuminate\Support\Facades\Storage;  // Para subir el fichero al disk 'images'
use Flash;
use Response;

class SparePartController extends AppBaseController
{
    /** @var  SparePartRepository */
    private $sparePartRepository;

    public function __construct(SparePartRepository $sparePartRepo)
    {
        $this->sparePartRepository = $sparePartRepo;
    }

    /**
     * Display a listing of the SparePart.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $spareParts = $this->sparePartRepository->paginate(5);

        return view('backend.spare_parts.index')
            ->with('spareParts', $spareParts);
    }

    public function showSparePart(Request $request)
    {
        $spareParts = $this->sparePartRepository->paginate(25);

        return view('repuestos')
            ->with('spareParts', $spareParts);
    }

    public function getSparepart($id)
    {

        $sparePart = $this->sparePartRepository->find($id);

        // Vamos a retornar un JSON, ya que este método va hacer llamado por un AJAX.
        $sparePart =  json_encode($sparePart);
        return $sparePart;
    }

    /**
     * Show the form for creating a new SparePart.
     *
     * @return Response
     */
    public function create()
    {
        $typeSparePart = TypeSparePart::pluck('name', 'id');

        return view('backend.spare_parts.create')->with(compact('typeSparePart'));
    }

    /**
     * Store a newly created SparePart in storage.
     *
     * @param CreateSparePartRequest $request
     *
     * @return Response
     */
    public function store(CreateSparePartRequest $request)
    {
        $image_path_name = null;
        $image = $request->file('image');
        if ($image) {

            // $clearName = trim(request('name'));
            // $clearName = str_replace(' ', '', $clearName);

            $extension = $request->file('image')->extension();
            $size = $request->file('image')->getSize();

            if (($extension == "jpeg") || ($extension == "png") || ($extension == "jpg")) {
                if ($size <= 992000) {
                    $image_path_name = $image->getClientOriginalName();
                    $media = 'storage/img/' . request('name') . '/' . $image_path_name;

                    // $media = 'public_html/' . $clearName . '/' . $image_path_name;
                } else {
                    Flash::error('El tamaño máximo permitido es de: 992000KB');
                    return redirect(route('admin.spareParts.index'));
                }
            } else {
                Flash::error('Los tipo de imágenes permitidas son: jpeg, png, jpg');
                return redirect(route('admin.spareParts.index'));
            }

            // Storage::disk('public')->put($clearName . '/' . $image_path_name, File::get($image));
            Storage::disk('images')->put(request('name') . '/' . $image_path_name, File::get($image));
        } else {
            $media = $image_path_name;
        }

        try {
            SparePart::create([
                'name' => request('name'),
                'description' => request('description'),
                'unit_value' => request('unit_value'),
                'image' => $media,
                'quantity' => request('quantity'),
                'type_spare_part_id' => request('type_spare_part_id'),
            ]);
        } catch (\Throwable $th) {
            Flash::error('Ya existe un repuesto o insumo con este nombre');
            return redirect(route('admin.spareParts.index'));
        }

        Flash::success('El repuesto e insumo se ha agregado correctamente.');

        return redirect(route('admin.spareParts.index'));
    }

    /**
     * Display the specified SparePart.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $sparePart = $this->sparePartRepository->find($id);

        if (empty($sparePart)) {
            Flash::error('El repuesto o insumo no se encuentra');

            return redirect(route('admin.spareParts.index'));
        }

        return view('backend.spare_parts.show')->with('sparePart', $sparePart);
    }

    /**
     * Show the form for editing the specified SparePart.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $sparePart = $this->sparePartRepository->find($id);
        $typeSparePart = TypeSparePart::pluck('name', 'id');

        if (empty($sparePart)) {
            Flash::error('El repuesto o insumo no se encuentra');

            return redirect(route('admin.spareParts.index'));
        }

        return view('backend.spare_parts.edit')->with(compact('sparePart', 'typeSparePart'));
    }

    /**
     * Update the specified SparePart in storage.
     *
     * @param int $id
     * @param UpdateSparePartRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSparePartRequest $request)
    {
        $sparePart = $this->sparePartRepository->find($id);

        if (empty($sparePart)) {
            Flash::error('El repuesto o insumo no se encuentra');

            return redirect(route('admin.spareParts.index'));
        }

        $image_path_name = null;
        $image = $request->file('image');
        if ($image) {
            $extension = $request->file('image')->extension();
            $size = $request->file('image')->getSize();

            if (($extension == "jpeg") || ($extension == "png") || ($extension == "jpg")) {
                if ($size <= 992000) {
                    $image_path_name = $image->getClientOriginalName();
                    $media = 'storage/img/' . request('name') . '/' . $image_path_name;
                } else {
                    Flash::error('El tamaño máximo permitido es de: 992000KB');
                    return redirect(route('admin.spareParts.index'));
                }
            } else {
                Flash::error('Los tipo de imágenes permitidas son: jpeg, png, jpg');
                return redirect(route('admin.spareParts.index'));
            }

            Storage::disk('images')->put(request('name') . '/' . $image_path_name, File::get($image));
        } else {
            $media = $image_path_name;
        }

        try {
            $sparePart->name = request('name');
            $sparePart->description = request('description');
            $sparePart->unit_value = request('unit_value');
            $sparePart->image = $media;
            $sparePart->quantity = request('quantity');
            $sparePart->type_spare_part_id = request('type_spare_part_id');

            $sparePart->save();
        } catch (\Throwable $th) {
            Flash::error('Ya existe un repuesto o insumo con este nombre');
            return redirect(route('admin.spareParts.index'));
        }



        Flash::success('El repuesto o insumo se ha actualizado exitosamente.');

        return redirect(route('admin.spareParts.index'));
    }

    /**
     * Remove the specified SparePart from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $sparePart = $this->sparePartRepository->find($id);

        if (empty($sparePart)) {
            Flash::error('El repuesto o insumo no se encuentra');

            return redirect(route('admin.spareParts.index'));
        }

        // Before of delete, verify that the spare part not have associateds providers.
        $resultQueriesOne = SparePart::select('spare_parts.id', 'provider_spare_parts.provider_id')
            ->Join('provider_spare_parts', 'spare_parts.id', '=', 'provider_spare_parts.spare_part_id')
            ->where('spare_parts.id', '=', $id)
            ->get();

        if (count($resultQueriesOne) > 0) {
            Flash::error('El proveedor no se puede eliminar, porque posee respuestos asociados.');
            return redirect(route('admin.spareParts.index'));
        }

        // $this->sparePartRepository->delete($id);

        $sparePart = SparePart::find($id);

        $path = $sparePart->image;
        if($path){
            $pathArray = explode("/", $path);
            $logoDirectory = $pathArray[0] . '/' .  $pathArray[1];
            $files = glob($logoDirectory. '/*');
            foreach($files as $file){
                if(is_file($file)){
                    unlink($file);
                }
            }
            rmdir($logoDirectory);   
        }

        $sparePart->forceDelete();

        Flash::success('El repuesto o insumo se ha eliminado exitosamente.');
        return redirect(route('admin.spareParts.index'));
    }
}

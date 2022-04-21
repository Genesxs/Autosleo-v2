<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\CreateProviderRequest;
use App\Http\Requests\Backend\UpdateProviderRequest;
use App\Repositories\Backend\ProviderRepository;
use App\Http\Controllers\AppBaseController;
use app\Models\Backend\Provider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;  // Para subir el fichero al disk 'images'
use Illuminate\Support\Facades\Storage;  // Para subir el fichero al disk 'images'
use Flash;
use Laracasts\Flash\Flash as FlashFlash;
use Response;

class ProviderController extends AppBaseController
{
    /** @var  ProviderRepository */
    private $providerRepository;

    public function __construct(ProviderRepository $providerRepo)
    {
        $this->providerRepository = $providerRepo;
    }

    /**
     * Display a listing of the Provider.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $providers = $this->providerRepository->paginate(5);

        return view('backend.providers.index')
            ->with('providers', $providers);
    }

    public function showProviders(Request $request)
    {
        $providers = $this->providerRepository->paginate(6);

        return view('proveedores')
            ->with('providers', $providers);
    }


    public function getProvider($id)
    {

        $provider = $this->providerRepository->find($id);

        // Vamos a retornar un JSON, ya que este método va hacer llamado por un AJAX.
        $provider =  json_encode($provider);
        return $provider;
    }


    /**
     * Show the form for creating a new Provider.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.providers.create');
    }

    /**
     * Store a newly created Provider in storage.
     *
     * @param CreateProviderRequest $request
     *
     * @return Response
     */
    public function store(CreateProviderRequest $request)
    {
        // $input = $request->all();

        // Subir archivo de la imagen al servidor:
        $image_path_name = null;
        $logo = $request->file('logo');
        if ($logo) {
            // $clearName = trim(request('name'));
            // $clearName = str_replace(' ', '', $clearName);  

            $extension = $request->file('logo')->extension();
            $size = $request->file('logo')->getSize();

            if (($extension == "jpeg") || ($extension == "png") || ($extension == "jpg")) {
                if ($size <= 248000) {
                    $image_path_name = $logo->getClientOriginalName();
                    $media = 'storage/img/' . request('name') . '/' . $image_path_name;

                   //$media = 'public_html/' . $clearName . '/' . $image_path_name;
                } else {
                    Flash::error('El tamaño máximo permitido es de: 248000KB');
                    return redirect(route('admin.providers.index'));
                }
            } else {
                Flash::error('Los tipo de imágenes permitidas son: jpeg, png, jpg');
                return redirect(route('admin.providers.index'));
            }

            // Storage::disk('public')->put($clearName . '/' . $image_path_name, File::get($logo));
            Storage::disk('images')->put(request('name') . '/' . $image_path_name, File::get($logo));
        } else {
            $media = $image_path_name;
        }

        try {
            Provider::create([
                'name' => request('name'),
                'description' => request('description'),
                'cellphone' => request('cellphone'),
                'email' => request('email'),
                'logo' => $media,
                'page' => request('page'),
                'address' => request('address'),
            ]);
        } catch (\Throwable $th) {
            Flash::error('Ya existe un proveedor con este nombre.');
            return redirect(route('admin.providers.index'));
        }

        // $provider = $this->providerRepository->create($input);

        Flash::success('El proveedor se ha guardado correctamente.');


        return redirect(route('admin.providers.index'));
    }

    /**
     * Display the specified Provider.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $provider = $this->providerRepository->find($id);

        if (empty($provider)) {
            Flash::error('El proveedor no se encuentra');

            return redirect(route('admin.providers.index'));
        }

        return view('backend.providers.show')->with('provider', $provider);
    }

    /**
     * Show the form for editing the specified Provider.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $provider = $this->providerRepository->find($id);

        if (empty($provider)) {
            Flash::error('El proveedor no se encuentra');

            return redirect(route('admin.providers.index'));
        }

        return view('backend.providers.edit')->with('provider', $provider);
    }

    /**
     * Update the specified Provider in storage.
     *
     * @param int $id
     * @param UpdateProviderRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProviderRequest $request)
    {
        $provider = $this->providerRepository->find($id);

        if (empty($provider)) {
            Flash::error('El proveedor no se encunetra');

            return redirect(route('admin.providers.index'));
        }

        // Subir archivo de la imagen al servidor:
        $image_path_name = null;
        $logo = $request->file('logo');
        if ($logo) {
            $extension = $request->file('logo')->extension();
            $size = $request->file('logo')->getSize();

            if (($extension == "jpeg") || ($extension == "png") || ($extension == "jpg")) {
                if ($size <= 248000) {
                    $image_path_name = $logo->getClientOriginalName();
                    $media = 'storage/img/' . request('name') . '/' . $image_path_name;
                } else {
                    Flash::error('El tamaño máximo permitido es de: 248000KB');
                    return redirect(route('admin.providers.index'));
                }
            } else {
                Flash::error('Los tipo de imágenes permitidas son: jpeg, png, jpg');
                return redirect(route('admin.providers.index'));
            }

            Storage::disk('images')->put(request('name') . '/' . $image_path_name, File::get($logo));
        } else {
            $media = $image_path_name;
        }

        try {
            $provider->name = request('name');
            $provider->description = request('description');
            $provider->cellphone = request('cellphone');
            $provider->email = request('email');
            $provider->logo = $media;
            $provider->page = request('page');
            $provider->address = request('address');
    
            $provider->save();
        } catch (\Throwable $th) {
            Flash::error('Ya existe un proveedor con este nombre.');
            return redirect(route('admin.providers.index'));
        }

       

        Flash::success('El proveedor se ha actualizado exitosamente.');

        return redirect(route('admin.providers.index'));
    }


    /**
     * Remove the specified Provider from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $provider = $this->providerRepository->find($id);

        if (empty($provider)) {
            Flash::error('El proveedor no se encuentra');

            return redirect(route('admin.providers.index'));
        }

        // Before of delete, verify that the provider not have associateds spare parts.
        $resultQueriesOne = Provider::select('providers.id', 'provider_spare_parts.spare_part_id')
            ->Join('provider_spare_parts', 'providers.id', '=', 'provider_spare_parts.provider_id')
            ->where('providers.id', '=', $id)
            ->get();

        if (count($resultQueriesOne) > 0) {
            Flash::error('El proveedor no se puede eliminar, porque posee respuestos asociados.');
            return redirect(route('admin.providers.index'));
        }

        $provider = Provider::find($id);

        $path = $provider->logo;
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

        $provider->forceDelete();   // physical delete.

        Flash::success('El proveedor se ha eliminado exitosamente.');
        return redirect(route('admin.providers.index'));

        // $this->providerRepository->delete($id);
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\CreateEmployeeRequest;
use App\Http\Requests\Backend\UpdateEmployeeRequest;
use App\Repositories\Backend\EmployeeRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Backend\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;  // Para subir el fichero al disk 'images'
use Illuminate\Support\Facades\Storage;  // Para subir el fichero al disk 'images'
use DB;
use Flash;
use Response;

class EmployeeController extends AppBaseController
{

    /** @var  EmployeeRepository */
    private $EmployeeRepository;

    public function __construct(EmployeeRepository $EmployeeRepo)
    {
        $this->EmployeeRepository = $EmployeeRepo;
    }


    /**
     * Display a listing of the Employee.
     *
     * @param Request $request
     *
     * @return Response
     */


    public function index(Request $request)
    {

        $employees = $this->EmployeeRepository->paginate(5);

        return view('backend.employees.index')
            ->with('employees', $employees);
    }

    public function showEmployees()
    {
        $employees = $this->EmployeeRepository->paginate('30');

        return view('quienes-somos')
            ->with('employees', $employees);
    }

    /**
     * Show the form for creating a new Employee.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.employees.create');
    }

    /**
     * Store a newly created Employee in storage.
     *
     * @param CreateEmployeeRequest $request
     *
     * @return Response
     */
    public function store(CreateEmployeeRequest $request)
    {
        $image_path_name = null;
        $image = $request->file('url_photo');
        if ($image) {

            // $clearName = trim(request('full_name'));
            // $clearName = str_replace(' ', '', $clearName); 

            $extension = $request->file('url_photo')->extension();
            $size = $request->file('url_photo')->getSize();

            if (($extension == "jpeg") || ($extension == "png") || ($extension == "jpg")) {
                if ($size <= 496000) {
                    $image_path_name = $image->getClientOriginalName();
                    $media = 'storage/img/' . request('name') . '/' . $image_path_name;

                    // $media = 'public_html/' . $clearName . '/' . $image_path_name;
                } else {
                    Flash::error('El tamaño máximo permitido es de: 496000KB');
                    return redirect(route('admin.employees.index'));
                }
            } else {
                Flash::error('Los tipo de imágenes permitidas son: jpeg, png, jpg');
                return redirect(route('admin.employees.index'));
            }

            // Storage::disk('public')->put($clearName . '/' . $image_path_name, File::get($image));
            Storage::disk('images')->put(request('name') . '/' . $image_path_name, File::get($image));
        } else {
            $media = $image_path_name;
        }

        Employee::create([
            'full_name' => request('full_name'),
            'position' => request('position'),
            'url_photo' => $media
        ]);


        Flash::success('El empleado se ha guardado exitosamente.');

        return redirect(route('admin.employees.index'));
    }

    /**
     * Display the specified Employee.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {

        $employee = $this->EmployeeRepository->find($id);

        if (empty($employee)) {
            Flash::error('Employee not found');

            return redirect(route('admin.employees.index'));
        }

        return view('backend.employees.show')->with('employee', $employee);
    }

    /**
     * Show the form for editing the specified Employee.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {

        $employee = $this->EmployeeRepository->find($id);

        if (empty($employee)) {
            Flash::error('Employee not found');

            return redirect(route('admin.employees.index'));
        }

        return view('backend.employees.edit')->with('employee', $employee);
    }

    /**
     * Update the specified Employee in storage.
     *
     * @param int $id
     * @param UpdateEmployeeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEmployeeRequest $request)
    {
        $employee = $this->EmployeeRepository->find($id);

        if (empty($employee)) {
            Flash::error('Employee not found');

            return redirect(route('admin.employees.index'));
        }

        $image_path_name = null;
        $image = $request->file('url_photo');
        if ($image) {
            $extension = $request->file('url_photo')->extension();
            $size = $request->file('url_photo')->getSize();

            if (($extension == "jpeg") || ($extension == "png") || ($extension == "jpg")) {
                if ($size <= 496000) {
                    $image_path_name = $image->getClientOriginalName();
                    $media = 'storage/img/' . request('name') . '/' . $image_path_name;
                } else {
                    Flash::error('El tamaño máximo permitido es de: 496000KB');
                    return redirect(route('admin.employees.index'));
                }
            } else {
                Flash::error('Los tipo de imágenes permitidas son: jpeg, png, jpg');
                return redirect(route('admin.employees.index'));
            }

            Storage::disk('images')->put(request('name') . '/' . $image_path_name, File::get($image));
        } else {
            $media = $image_path_name;
        }

        $employee->full_name = request('full_name');
        $employee->position = request('position');
        $employee->url_photo = $media;
        $employee->save();

        Flash::success('El empleado se ha actualizado exitosamente.');

        return redirect(route('admin.employees.index'));
    }

    /**
     * Remove the specified Employee from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $employee = $this->EmployeeRepository->find($id);

        if (empty($employee)) {
            Flash::error('El empleado no existe.');

            return redirect(route('admin.employees.index'));
        }

        $path = $employee->image;
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

        // $employee = $this->EmployeeRepository->delete($id);
        DB::table('employees')->whereId($id)->delete();

        Flash::success('El empleado ha sido eliminado exitosamente.');

        return redirect(route('admin.employees.index'));
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\CreateDiscountRequest;
use App\Http\Requests\Backend\UpdateDiscountRequest;
use App\Repositories\Backend\DiscountRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Backend\SparePart;
use Illuminate\Http\Request;
use Flash;
use Response;

class DiscountController extends AppBaseController
{
    /** @var  DiscountRepository */
    private $discountRepository;

    public function __construct(DiscountRepository $discountRepo)
    {
        $this->discountRepository = $discountRepo;
    }

    /**
     * Display a listing of the Discount.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $discounts = $this->discountRepository->paginate(5);

        return view('backend.discounts.index')
            ->with('discounts', $discounts);
    }

    /**
     * Show the form for creating a new Discount.
     *
     * @return Response
     */
    public function create()
    {
        $sparePart = SparePart::pluck('name','id');

        return view('backend.discounts.create')->with(compact('sparePart'));
    }

    /**
     * Store a newly created Discount in storage.
     *
     * @param CreateDiscountRequest $request
     *
     * @return Response
     */
    public function store(CreateDiscountRequest $request)
    {
        $input = $request->all();

        $discount = $this->discountRepository->create($input);

        Flash::success('El descuento se ha guardado satisfactoriamente.');

        return redirect(route('admin.discounts.index'));
    }

    /**
     * Display the specified Discount.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $discount = $this->discountRepository->find($id);

        if (empty($discount)) {
            Flash::error('No se encuentra el descuento');

            return redirect(route('admin.discounts.index'));
        }

        return view('backend.discounts.show')->with('discount', $discount);
    }

    /**
     * Show the form for editing the specified Discount.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $sparePart = SparePart::pluck('name','id');

        $discount = $this->discountRepository->find($id);

        if (empty($discount)) {
            Flash::error('No se encuentra el descuento');

            return redirect(route('admin.discounts.index'));
        }

        return view('backend.discounts.edit')->with(compact('discount', 'sparePart'));
    }

    /**
     * Update the specified Discount in storage.
     *
     * @param int $id
     * @param UpdateDiscountRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDiscountRequest $request)
    {
        $discount = $this->discountRepository->find($id);

        if (empty($discount)) {
            Flash::error('No se encuentra el descuento');

            return redirect(route('admin.discounts.index'));
        }

        $discount = $this->discountRepository->update($request->all(), $id);

        Flash::success('El descuento se ha actualizado con exito.');

        return redirect(route('admin.discounts.index'));
    }

    /**
     * Remove the specified Discount from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $discount = $this->discountRepository->find($id);

        if (empty($discount)) {
            Flash::error('No se encuentra el descuento');

            return redirect(route('admin.discounts.index'));
        }

        $this->discountRepository->delete($id);

        Flash::success('El descuento se ha eliminado con exito.');

        return redirect(route('admin.discounts.index'));
    }
}

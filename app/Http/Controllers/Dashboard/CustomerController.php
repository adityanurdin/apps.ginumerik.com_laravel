<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Validator;
use App\Models\Customer;
use DataTables;
use App\Http\Requests\CustomerRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.administrasi.customer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.administrasi.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
     /*    $rule = [
            'nama_perusahaan' => 'required|string',
            'alamat'          => 'string',
            'no_tlp'          => 'required',
            'email'           => 'email',
            'kontak_personel' => 'string|required',
        ];
        
        $validation = Validator::make($request->all(), $rule)->validate(); */

        $customer = Customer::create($request->all());

        if ($customer) {
            toast('Customer Created Successfully.','success');
            return redirect()->route('customer.index');
        } else {
            toast('something wrong, please try again.','success');
            return redirect()->route('customer.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('admin.administrasi.customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request, $id)
    {
        $customer = Customer::find($id);
        $customer->update($request->all());

        if ($customer) {
            toast('Customer updated successfully.','success');
            return redirect()->route('customer.index');
        } else {
            toast('something wrong, please try again.','success');
            return redirect()->route('customer.edit', $id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();

        if ($customer) {
            toast('Customer deleted successfully.','success');
            return redirect()->route('customer.index');
        } else {
            toast('something wrong, please try again.','error');
            return redirect()->route('customer.index');
        }
    }

    /**
     * Return data json for datatables serverside
     */
    public function data()
    {
        $data = Customer::all();
        return DataTables::of($data)
                            ->addIndexColumn()
                            ->editColumn('nama_perusahaan', function($item) {
                                $result = $item->nama_perusahaan. '<br>';
                                $result .= '<a href='.route('customer.edit', $item->id).'>Edit</a> <a href="javascript:void(0)" onclick="myConfirm('.$item->id.')">Delete</a> ';
                                return $result;
                            })
                            ->editColumn('email', function($item) {
                                return '<a href="mailto:'.$item->email.'">'.$item->email.'</a>';
                            })
                            ->escapeColumns([])
                            ->make(true);
    }
}

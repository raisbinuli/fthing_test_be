<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CustomerPostRequest;
use App\Http\Requests\CustomerUpdateRequest;
use App\Http\Resources\CustomerResource;
use App\Models\Customers;
use Hash;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $customer = Customers::simplePaginate(15);
        return response($this->return(CustomerResource::collection($customer)->response()->getData(true),'success','',200),200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerPostRequest $req)
    {
        //
        try { 
            $input = $req->only([
                'name',
                'email' ,            
                'password',
                'gender',
                'is_married',
                'address'
            ]);
            $input['password'] = Hash::make($input['password']);
            $customer = Customers::create($input);
        } catch(\Illuminate\Database\QueryException $e){ 
            return response($this->return(null,'failed',$e->getMessage(),500),500);
        }
        
        return response($this->return(null,'success','New customer has been succesfuly created',201),201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Customers $customer)
    {
        //
        return response($this->return(Array('data'=>CustomerResource::collection(array($customer))),'success','',200),200);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerUpdateRequest $req, Customers $customer)
    {
        //
        try { 

            $customer->update($req->only([
                'name',
                'email' , 
                'gender',
                'is_married',
                'address'
            ]));
        } catch(\Illuminate\Database\QueryException $e){ 
            return response($this->return(null,'failed',$e->getMessage(),500),500);
        }
        
        return response($this->return(Array('data'=>CustomerResource::collection(array($customer))),'success','This customer has been successfuly updated',200),200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customers $customer)
    {
        //
        
        try { 
            $customer->delete();
        } catch(\Illuminate\Database\QueryException $e){ 
            return response($this->return(null,'failed',$e->getMessage(),500),500);
        }
        return response($this->return(null,'success','This customer has been successfuly deleted',200),200);
    }
}

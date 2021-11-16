<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('salary.dashboard');
    }
    public function dashborad()
    {
        //
        return view('salary.MD.dashboard');
    }

    public function cost()
    {
        return view('salary.cost');
    }
    public function cost_detail()
    {
        return view('salary.cost_detail');
    }
    public function payment()
    {
        return view('salary.payment');
    }
    public function payment_detail()
    {
        return view('salary.payment_detail');
    }
    // MD
    public function cost_MD()
    {
        return view('salary.MD.cost');
    }
    public function cost_detail_MD()
    {
        return view('salary.MD.cost_detail');
    }
    public function payment_MD()
    {
        return view('salary.MD.payment');
    }
    public function payment_detail_MD()
    {
        return view('salary.MD.payment_deatil');
    }


    public function history()
    {
        return view('salary.history');
    }
    public function historydetail($id)
    {
        return view('salary.historydetail');
    }
    public function printsalary()
    {
        return view('salary.printsalary');
    }
    public function printdetail()
    {
        return view('salary.printdetail');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       return view('salary.create');
    }
    public function detail()
    {
        //
       return view('salary.detail');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

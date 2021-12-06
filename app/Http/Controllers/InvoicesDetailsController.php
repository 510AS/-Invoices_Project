<?php

namespace App\Http\Controllers;

use App\Models\invoice;
use App\Models\invoice_attachments;
use App\Models\invoices_details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InvoicesDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\invoices_details  $invoices_details
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $invoices = invoice::where('id',$id)->first();
        $details  = invoices_Details::where('id_Invoice',$id)->get();
        $attachments  = invoice_attachments::where('invoice_id',$id)->get();

        return view('invoices.details_invoice',compact('invoices','details','attachments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\invoices_details  $invoices_details
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\invoices_details  $invoices_details
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, invoices_details $invoices_details)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\invoices_details  $invoices_details
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $invoices = invoice_attachments::findOrFail($request->id_file);

        if ($request->type === 'pdf') {
            $path = $request->invoice_number.'/PDF';

        }else{
            $path = $request->invoice_number.'/Image';
        }
        Storage::disk('public_uploads')->delete($path.'/'.$request->file_store_name);

        $invoices->delete();

        session()->flash('delete', 'تم حذف المرفق بنجاح');
        return back();
    }

    public function get_file($invoice_number,$file_store_name,$type)

    {
        if ($type === 'pdf') {
                $path = $invoice_number.'/PDF';

            }else{
                $path = $invoice_number.'/Image';
            }
        $contents= Storage::disk('public_uploads')->getDriver()->getAdapter()->applyPathPrefix($path.'/'.$file_store_name);
        return response()->download( $contents);
    }



    public function open_file($invoice_number,$file_store_name,$type)

    {
        if ($type === 'pdf') {
                $path =  $invoice_number.'/PDF';

            }else{
                $path =  $invoice_number.'/Image';
            }
        $files = Storage::disk('public_uploads')->getDriver()->getAdapter()->applyPathPrefix($path.'/'.$file_store_name);
        return response()->file($files);
    }
}

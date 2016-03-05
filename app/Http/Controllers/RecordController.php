<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Services\Record;

use App\Absort;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('record.index', ['active' => ['index' => 'active', 'create' => null]]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('record.create', ['active' => ['index' => null, 'create' => 'active']]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $type = $request->get('type');
        $value = $request->get('value');
        try {
            $ret = Record::addRecord(['type' => $type, 'value' => $value]);
        } catch (Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()]);
        }
        $data = Record::getTodayRecordsByType($type);
        return response()->json(['error' => false, 'type_name' => $data['type_name'], 'sum' => $data['sum'], 'unit' => $data['unit']]);
    }

    public function modify(Request $request)
    {
        $id = $request->get('id');
        try {
            $ab = Absort::findOrFail($id);
            $ab->update(['modified_at' => time()]);
        } catch (Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()]);
        }
        return response()->json(['error' => false]);
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

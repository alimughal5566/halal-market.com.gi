<?php

namespace App\Http\Controllers\Admin;

use Datatables;
use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;

class VideoController extends Controller {

    public function __construct() {
        $this->middleware('auth:admin');
    }

    //*** JSON Request
    public function datatables() {
        $datas = Video::orderBy('id', 'desc')->get();

        //--- Integrating This Collection Into Datatables
        return Datatables::of($datas)
                        ->addColumn('id', function(Video $data) {
                            return '<div>' . $data->id . '</div>';
                        })
                        ->addColumn('code', function(Video $data) {
                            return '<div>' . $data->code . '</div>';
                        })
                        ->addColumn('action', function(Video $data) {
                            return '<div class="action-list"><a href="javascript:;" data-href="' . route('admin-video-delete', $data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a></div>';
                        })
                        ->rawColumns(['id', 'code', 'action'])
                        ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index() {
        return view('admin.video.index');
    }

    //*** GET Request
    public function create() {
        return view('admin.video.create');
    }

    //*** POST Request
    public function store(Request $request) {
        //--- Validation Section
        $rules = [
            'photo' => '',
        ];

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends
        //--- Logic Section
        $data = new Video();
        $input = $request->all();

        $data->fill($input)->save();
        //--- Logic Section Ends
        //--- Redirect Section
        $msg = 'New Data Added Successfully. <a href="' . route('admin-video-index') . '">View Videos List.</a>';
        return response()->json($msg);
        //--- Redirect Section Ends    
    }

    //*** GET Request Delete
    public function destroy($id) {
        $data = Video::findOrFail($id);
        $data->delete();
        //--- Redirect Section     
        $msg = 'Data Deleted Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends     
    }

}

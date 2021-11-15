<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\nhanvien;
use Mail;
use Cart;
use Validator;
use Excel;
use input;
use Yajra\Datatables\Datatables;

class NhanvienController extends Controller
{
// NHÂN VIÊN
    public function nhanvien()
        {
            $iduser = intval(Auth::User()->quyen);
            $xem_ac= DB::table('users')->where('quyen',$iduser)->get();
            return view('nhanvien.nhanvien',compact('iduser','xem_ac'));
        }
        public function getthemnhanvien()
        {
        $students = nhanvien::select('id','Ten', 'Ngaysinh','SDT','DiaChi','Vaitro');
        return Datatables::of($students)   
        ->addColumn('action', function($student){
            return '<a href="#" class="btn btn-xs btn-primary edit" id="'.$student->id.'">
            <i class="glyphicon glyphicon-edit"></i>
            Sửa</a><a href="#" class="btn btn-xs btn-danger delete" id="'.$student->id.'">
            <i class="glyphicon glyphicon-remove"></i> Xóa</a>';
        })
        ->make(true);
        }
    public function postthemnhanvien(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'Ten' => 'required',
            'Ngaysinh'  => 'required',
            'SDT'  => 'required',           
            'DiaChi'  => 'required',
            'Vaitro'  => 'required'
        ]);

        $error_array = array();
        $success_output = '';
        if ($validation->fails())
        {
            foreach($validation->messages()->getMessages() as $field_name => $messages)
            {
                $error_array[] = $messages;
            }
        }
        else
        {
            if($request->get('button_action') == "insert")
            {
                $student = new nhanvien([
                    'Ten'    =>  $request->get('Ten'),
                    'Ngaysinh'  =>  $request->get('Ngaysinh'),
                    'SDT'     =>  $request->get('SDT'),
                    'DiaChi'     =>  $request->get('DiaChi'),
                    'Vaitro'     =>  $request->get('Vaitro')
                ]);
                $student->save();
                $success_output = '<div class="alert alert-success">Data Inserted</div>';
            }
            if($request->get('button_action') == 'update')
            {
                $student = nhanvien::find($request->get('student_id'));
                $student->Ten = $request->get('Ten');
                $student->Ngaysinh = $request->get('Ngaysinh');
                $student->SDT = $request->get('SDT');
                $student->DiaChi = $request->get('DiaChi');
                $student->Vaitro = $request->get('Vaitro');
                $student->save();
                $success_output = '<div class="alert alert-success">Data Updated</div>';
            }
        }
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
    }
    public function suanhanvien(Request $request)
    {
        $id = $request->input('id');
        $student = nhanvien::find($id);
        $output = array(
            'Ten'    =>  $student->Ten,
            'Ngaysinh'     =>  $student->Ngaysinh,
            'SDT'    =>  $student->SDT,
            'DiaChi'    =>  $student->DiaChi,
            'Vaitro'    =>  $student->Vaitro
        );
        echo json_encode($output);
    }
    public function xoanhanvien(Request $request)
    {
        $student = nhanvien::find($request->input('id'));
        if($student->delete())
        {
            echo 'Data Deleted';
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Admin\Student;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{

    public static function index() {
        return view('students.student');
    }

    public static function create(){
        return view('students.create');
    }
    public static function createCoba(){
        return view('pplg1.create');
    }

    //Create
    public static function createData(Request $request){
        try {
            $student = new Student();

            $student->nama = $request->nama;
            $student->nis = $request->nis;
            $student->umur = $request->umur;
            $student->alamat = $request->alamat;
            $student->class_id = $request->class_id;

            $student->save();

            return response()->json([
                'message' => "Berhasil Tambah Data",
                'data' => $student
            ]);
        } catch (\Exception $e) {
            return $e;
        }

    }

    //Read

    public static function getAll(){
        return Student::with('getClass')->get();
    }

    public static function edit($id){
        $data = Student::find($id);
        return view('students.edit', ['student' => $data]);
    }


    public static function updateData(Request $request, $id) {
        $student = DB::select(
            DB::raw("update students set nama = '$request->nama',
            updated_at = now() where id = '$id' "));

        $updated = Student::find($id);

        return $updated;
    }

    public static function destroyData(Request $request, $id){
        try {
            $student = Student::destroy($id);

            if ($student) {
                return "Data Berhasil dihapus";
            }else{
                throw new Exception("Tidak ada data dengan id $id");
            }

        } catch (\Exception $e) {
            throw $e;
        }


    }
}

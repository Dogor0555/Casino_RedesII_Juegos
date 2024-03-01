<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;
use Illuminate\Support\Facades\Auth;

class ClassController extends Controller
{
    public function list(){
       $data['getRecord'] = ClassModel::getRecord();
        $data["header_title" ] = "Class List";
        return view("admin.class.list", $data);
    }


    public function add(){
        
        $data["header_title" ] = "Add New Class";
        return view("admin.class.add", $data);
    }

    public function insert(Request $request)
    {
        // **Adición de validaciones para los campos 'name', 'status'**
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|integer|in:0,1',
        ]);
    
    
        $classModel = new ClassModel(); 
        $classModel->name = trim($request->name);
        $classModel->status = $request->status;
        $classModel->created_by = Auth::user()->id;

        $classModel->save();
    
        return redirect("admin/class/list")->with("welcomeMessage", "Clase creada correctamente.");
    }   


    public function edit($id){
        $data['getRecord'] = ClassModel::getSingle($id);
        if(!empty($data['getRecord'])){
            $data['header_title'] = "Edit Class";
            return view("admin.class.edit", $data);
        }else{
            abort(404);
        }
    }

    public function update($id, Request $request){
        $save = ClassModel::getSingle($id);
        $save->name = $request->name;
        $save->status = $request->status;
        $save->save();

        return redirect("admin/class/list")->with("welcomeMessage", "Clase editada correctamente.");

    }


    public function delete($id){
        $classModel = ClassModel::getSingle($id);
        $classModel->is_delete = 1;
        $classModel->save();
 
        return redirect("admin/class/list")->with("welcomeMessage","Clase eliminado correctamente.");

    }


}

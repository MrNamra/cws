<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\assignments;
use App\Models\collages;
use App\Models\departments;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class CollegeController extends Controller
{
    public function AddCollege(Request $request)
    {
        $request->validate([
            'clg_full_name' => 'required|string',
            'clg_short_name' => 'required|alpha',
            'id' => 'nullable|numeric',
        ]);
        $clg = collages::find($request->input('id'));
        if ($clg) {
            $clg->update([
                'full_name' => $request->input('clg_full_name'),
                'short_name' => $request->input('clg_short_name'),
            ]);
            return json_encode(['mess' => 'Collage Update Successfully!!']);
        } else {
            $clg = new collages();

            $clg->full_name = $request->input('clg_full_name');
            $clg->short_name = $request->input('clg_short_name');
            $clg->added_by = auth()->user()->id;
            $clg->save();
            return json_encode(['mess' => 'success']);
        }
        return json_encode(['mess' => 'fail']);
    }
    public function AddDepartment(Request $request)
    {
        $request->validate([
            'full_dep' => 'required|string',
            'short_dep' => 'required|alpha',
            'id' => 'nullable|numeric',
            'clg_id' => 'required|numeric',
        ]);
        $dep = departments::find($request->input('id'));
        if ($dep) {
            $dep->update([
                'full_name'=>$request->input('full_dep'),
                'short_name'=>$request->input('short_dep'),
                'cld_id'=>$request->input('clg_id'),
            ]);
            return json_encode(['mess' => 'Department Update SuccessFully!!']);
        } else {
            $dep = new departments();

            $dep->full_name = $request->input('full_dep');
            $dep->short_name = $request->input('short_dep');
            $dep->clg_id = $request->input('clg_id');
            $dep->added_by = auth()->user()->id;
            $dep->save();

            return json_encode(['mess' => 'success']);
        }
        return json_encode(['mess' => 'fail']);
    }
    public function AddAssignment(Request $req)
    {
        $req->validate([
            'clg_id' => 'required|numeric',
            'dep_id' => 'required|numeric',
            'ass_title' => 'required|string',
            'ass_sem' => 'required|string',
            'ass_type' => 'required|alpha',
            'ass_dec' => 'required|string',
            'url' => 'url|nullable',
            'id' => 'nullable|numeric',
        ]);
        $fileName = null;
        if (!$req->input('url')) {
            if ($req->hasFile('ass_file')) {
                $file = $req->file('ass_file');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move('assignment', $fileName);
            }else{
                return json_encode(['mess' => 'Link or File is needed!']);
            }
        }
        if($req->input('id')){
            $ass = assignments::where('id', $req->input('id'))->update([
                'clg_id' => $req->input('clg_id'),
                'dep_id' => $req->input('dep_id'),
                'title' => $req->input('ass_title'),
                'dec' => $req->input('ass_dec'),
                'year' => $req->input('ass_sem'),
                'type' => $req->input('ass_type'),
                'link' => ($fileName)?'assignment/'.$fileName : $req->input('url'),
                'ucode' => $this->generateRandomString(),
                'added_by' => auth()->user()->id,
            ]);

        }else{

            $ass = new assignments();
            
            $ass->clg_id = $req->input('clg_id');
            $ass->dep_id = $req->input('dep_id');
            $ass->title = $req->input('ass_title');
            $ass->dec = $req->input('ass_dec');
            $ass->year = $req->input('ass_sem');
            $ass->type = $req->input('ass_type');
            $ass->link = ($fileName)?'assignment/'.$fileName : $req->input('url');
            $ass->ucode = $this->generateRandomString();
            $ass->added_by = auth()->user()->id;
            
            $ass->save();
        }

        return redirect(route('addui'))->with('message', 'done');
    }

    public function getDescription(Request $req){
        $req->validate(['id'=>'required|alphadash']);
        $dec = assignments::select('dec')->where('ucode', $req->input('id'))->first();
        return response(json_encode($dec));
    }

    public function DeleteAssignment(Request $req){
        $req->validate([
            'ass_id' => 'required|numeric',
        ]);
        $ass = $req->has('ass')?1:0;
        $dep = $req->has('dep')?1:0;
        $clg = $req->has('clg')?1:0;
        $err_mes=null;
        $mes= '';

        $assignment = assignments::select('id', 'dep_id', 'clg_id')->find($req->input('ass_id'));
        if($ass){
            $status = $assignment->delete();
            if($status){
                $mes = 'Assginmnent';
            }
        }
        if($dep){
            $dep = assignments::where('dep_id', $assignment->dep_id)->first();
            if($dep->count() < 1){
                $dep->delete();
                $mes .= ', Department';
                $err_mes=null;
            }else{
                $err_mes = 'Department Still Have Assignamnet Delete it First.';
            }
        }
        if($clg){
            $clg = departments::where('clg_id', $assignment->clg_id)->first();
            if($clg->count() < 1){
                $clg->delete();
                $mes .= '... And Collage';
                $err_mes=null;
            }else{
                $err_mes = 'Selected Collage have still remaing Department.';
            }
        }
        if($err_mes){
            return response(json_encode(['type'=>'fail', 'mesage'=>$mes. ' '. $err_mes]));
        }
        $mes .= " Deleted Successfull";

        return response(json_encode(['type'=>'success', 'mesage'=>$mes]));
    }

    public function generateRandomString()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz-_';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 6; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}

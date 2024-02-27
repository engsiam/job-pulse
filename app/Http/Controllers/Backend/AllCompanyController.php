<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\AllCompanyDataTable;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AllCompanyController extends Controller
{
    public function index(AllCompanyDataTable $dataTable)
    {
        return $dataTable->render('admin.companis.index');
    }

    public function changeStatus(Request $request){

        $user = User::findOrFail($request->id);
        $user->status = $request->status == 'true' ? 'active' : 'inactive';
        $user->save();

        return response(['message' => 'Status has been Updated!']);
    }
}

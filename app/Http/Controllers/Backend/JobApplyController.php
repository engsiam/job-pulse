<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\JobApplyAdminDataTable;

class JobApplyController extends Controller
{
    public function jobApply(JobApplyAdminDataTable $datatable){
      return $datatable->render('admin.job-apply.index');
    }
}

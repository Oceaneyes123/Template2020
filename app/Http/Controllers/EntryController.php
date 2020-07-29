<?php

namespace App\Http\Controllers;

use App\EntryModel;
use Illuminate\Http\Request;

class EntryController extends Controller
{
     public function addData(Request $request){
      $toEntry = $request->entry;
      $newData = new EntryModel;
      $newData->entry = $toEntry;
      $newData->save();
      return response()->json($newData);
    }

    public function showList(Request $request){
      $allData = EntryModel::all();
      return response()->json(['list' => $allData]);
    }

  public function updateData(Request $request){
      $id = $request->id;
      $toEdit = $request->entry;
      $newData = EntryModel::find($id);
      $newData->entry = $toEdit;
      $newData->save();
      return response()->json($newData);
  }

  public function deleteData(Request $request){
      $data = EntryModel::find ( $request->id )->delete();
  }
}

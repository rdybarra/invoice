<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\SettingGroup;
use Illuminate\Support\Facades\Input;

class SettingGroupController extends Controller
{
    public function edit(Request $request)
    {
        $settingGroup = SettingGroup::first();

        return view('settings/edit', [
            'settingGroup' => $settingGroup
        ]);
    }

    public function update(Request $request)
    {
        $settingGroup = SettingGroup::first();

        $settingGroup->update(Input::all());

        $request->session()->flash('success', 'The settings have been changed.');
        return redirect('/settings');
    }
}

<?php

namespace Modules\Performance\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashBoard;
use Illuminate\Support\Facades\Auth;

class Dashboard extends BaseDashboard
{
    /*
    public function __construct(){
        $user=Auth::user();
        if($user==null){
            abort(403);
        }

        $name=static::getName();//"getName" => "modules.performance.filament.pages.dashboard"
        $module=collect(explode('.',(string) $name))->get(1);
        if(!$user->hasModule($module)){
            abort(403);
        }


    }
    */
}

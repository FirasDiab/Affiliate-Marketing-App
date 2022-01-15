<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RegisterViews extends Model
{
    protected $guarded = [];

    public function getCountViewRegisteredPage() {
        return DB::table('register_views')->select('count')
                    ->where('id', 1)->get()[0]->count;
    }
}

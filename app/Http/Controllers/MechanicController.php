<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Mechanic;
use App\Models\Owner;
use Illuminate\Http\Request;

class MechanicController extends Controller
{
    public function create()
    {
        $mechanic = new Mechanic();
        $mechanic->mechanic_name = "Aliyan";
        $mechanic->save();

        $car = new Car();
        $car->model = "Mercedes A64";
        $car->mechanic_id = $mechanic->id;
        $car->save();

        $owner = new Owner();
        $owner->owner_name = "Raza Bangi";
        $owner->email = "muhammadrazabangi9@gmail.com";
        $owner->car_id = $car->id;
        $owner->save();
    }

    public function show($id)
    {
        // $mechanic = Mechanic::where("id", $id)
        //     ->with("car")
        //     ->get();
        // dd($mechanic[0]->owner);

        $owner = Owner::find($id);
        $mechanic = Mechanic::find($owner->car->mechanic_id);
        dd($mechanic);
    }
}

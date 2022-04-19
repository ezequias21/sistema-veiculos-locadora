<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Vehicle as RequestVehicle;
use App\ModelCar;
use App\Vehicle;
use App\Brand;
use App\User;
use App\VehicleImage;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vehicles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestVehicle $request)
    {

        $vehicle_created = Vehicle::create($request->all());
        return redirect()
            ->route('admin.vehicles.edit', ['vehicle' => $vehicle_created->id])
            ->with(['color' => 'success', 'message' => 'Cliente cadastrado com sucesso!', 'icon' => 'check']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::all();
        $categories = Category::all();
        $model_cars  = ModelCar::all();
        $brands = Brand::all();
        $vehicle = Vehicle::where('id', $id)->first();

        return view(
            'admin.vehicles.edit',
            [
                'users' => $users,
                'categories' => $categories,
                'model_cars' => $model_cars,
                'brands' => $brands,
                'vehicle' => $vehicle
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestVehicle $request, $id)
    {
        $vehicle = Vehicle::where('id', $id)->first();
        $vehicle->fill($request->all());

        //Set checkboxs attibrutes that is not check
        $vehicle->setNativeWifiAttribute($request->native_wifi);
        $vehicle->setEmergencyBrankingSystemAttribute($request->emergency_branking_system);
        $vehicle->setEasyParkAttribute($request->easy_park);
        $vehicle->setSunroofAttribute($request->sunroof);
        $vehicle->setReversingCameraAttribute($request->reversing_camera);
        $vehicle->setStabilityAndTractionSystemAttribute($request->stability_and_traction_system);
        $vehicle->setRemoteStartAttribute($request->remote_start);
        $vehicle->setAirBagAttribute($request->air_bag);
        $vehicle->setEletricWindowscreenAttribute($request->eletric_windowscreen);
        $vehicle->setAirConditionerAttribute($request->air_conditioner);
        $vehicle->setEletricLockAttribute($request->eletric_lock);
        $vehicle->setHydraulicSteeringAttribute($request->hydraulic_steering);
        $vehicle->setAbsAttribute($request->abs);

        $vehicle->save();

        if ($request->allFiles()) 
        {
            foreach ($request->allFiles()['files'] as $image) 
            {
                $vehicleImage = new VehicleImage();
                $vehicleImage->vehicle = $vehicle->id;
                $vehicleImage->path = $image->store('vehicles/' . $vehicle->id);
                $vehicleImage->save();
                unset($vehicleImage);
            }
        }
        return redirect()
            ->route('admin.vehicles.edit', ['vehicle' => $vehicle->id])
            ->with(['color' => 'success', 'message' => 'Veículo atualizado com sucesso!', 'icon' => 'check']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

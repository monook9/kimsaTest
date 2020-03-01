<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Provider;

class ProviderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(Request $request) {

        // Start custom query
        $provider = Provider::query();
        
        // Get Parameters for GET
        $name = $request->name;
        $reputationMin = $request->reputationMin == null ? 0 : $request->reputationMin;
        $reputationMax = $request->reputationMax == null ? 5 : $request->reputationMax;
        $type_provider = $request->type_provider;
        $pagination = $request->pagination == null ? 10 : $request->pagination;

        // Filter for type of provider
        if(isset($type_provider)){
            if($type_provider == 1){
                // 1 is for institution type then don't show users
                $provider->with('institution:id,name,logo');
            } elseif($type_provider == 2){
                // 2 is for user type then don't show institutions
                $provider->with('user:id,first_name,last_names,avatar');
            }
        } else {
            $provider   ->with('institution:id,name,logo')
                        ->with('user:id,first_name,last_names,avatar');
        }

        $provider   ->with('ratings_summary:id,avg,count')
                    ->with('setting:id,allow_public_quotation,allow_public_scheduling');

        // Filter for name of provider
        if(isset($name)){
            // Filter for type of provider
            if(isset($type_provider)){
                if($type_provider == 1){
                    // 1 is for institution type then don't show users
                    $provider   ->with(array('institution'=>function($query) use($name) {
                                    $query->select('id','name','logo')->where('name','LIKE','%'.$name.'%');
                                }))
                                ->whereHas('institution', function ($query) use($name) {
                                    $query->where('name','LIKE','%'.$name.'%');
                                });
                } elseif($type_provider == 2){
                    // 2 is for user type then don't show institutions
                    $provider->with(array('user'=>function($query) use($name) {
                        $query  ->select('id','first_name','last_names','avatar')
                                ->where('first_name','LIKE','%'.$name.'%')
                                ->OrWhere('last_names','LIKE','%'.$name.'%');
                    }))
                    ->OrWhereHas('user', function ($query) use($name) {
                        $query  ->where('first_name','LIKE','%'.$name.'%')
                                ->OrWhere('last_names','LIKE','%'.$name.'%');
                        });
                }
            } else {
                $provider   ->with(array('institution'=>function($query) use($name) {
                                $query->select('id','name','logo')->where('name','LIKE','%'.$name.'%');
                            }))
                            ->whereHas('institution', function ($query) use($name) {
                                $query->where('name','LIKE','%'.$name.'%');
                            })
                            ->with(array('user'=>function($query) use($name) {
                                $query  ->select('id','first_name','last_names','avatar')
                                        ->where('first_name','LIKE','%'.$name.'%')
                                        ->OrWhere('last_names','LIKE','%'.$name.'%');
                            }))
                            ->OrWhereHas('user', function ($query) use($name) {
                                $query  ->where('first_name','LIKE','%'.$name.'%')
                                        ->OrWhere('last_names','LIKE','%'.$name.'%');
                            });
            }
        }

        // Filter for reputacion MIN and MAX
        $provider   ->whereHas('ratings_summary', function ($query) use($reputationMin,$reputationMax) {
                        $query->whereBetween('avg',[$reputationMin,$reputationMax]);
                    });

        if($provider->count() == 0){
            // Dont found data with the params -> No content
            return response()->json(
                [
                    'code' => '402' ,
                    'message' => 'No content',
                    'result' => ['providers' => $provider->paginate($pagination)]
                ], 402);
        } else {
            // Data found -> OK
            return response()->json(
                [
                    'code' => '200' ,
                    'message' => 'OK',
                    'result' => ['providers' => $provider->paginate($pagination)]
                ], 200);
        }
    }

}

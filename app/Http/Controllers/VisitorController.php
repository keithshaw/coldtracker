<?php

namespace App\Http\Controllers;

use App\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, VisitorService $vs)
    {

        //get visitor ip
        function get_client_ip_by_getenv() {
            $ipaddress = '';
            if (getenv('HTTP_CLIENT_IP'))
                $ipaddress = getenv('HTTP_CLIENT_IP');
            else if(getenv('HTTP_X_FORWARDED_FOR'))
                $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
            else if(getenv('HTTP_X_FORWARDED'))
                $ipaddress = getenv('HTTP_X_FORWARDED');
            else if(getenv('HTTP_FORWARDED_FOR'))
                $ipaddress = getenv('HTTP_FORWARDED_FOR');
            else if(getenv('HTTP_FORWARDED'))
                $ipaddress = getenv('HTTP_FORWARDED');
            else if(getenv('REMOTE_ADDR'))
                $ipaddress = getenv('REMOTE_ADDR');
            else
                $ipaddress = 'UNKNOWN';
          
            return $ipaddress;
        }
        //make and save the visitor record
        Visitor::create([
            'longitude'=>$request->coords['longitude'],
            'latitude'=>$request->coords['latitude'],
            'ip_address'=>get_client_ip_by_getenv()
        ]);

        //generate the JSON file
        function generate_geojson(){
            $geojson = [
                'type' => "FeatureCollection",
                'features' => [],
            ];

            $visitors = Visitor::get()->all();
            // dd($visitors);

            foreach ($visitors as $key => $visitor) {
                $geojson['features'][$key] = [
                    'type' => "Feature",
                    'properties' => [
                        "scalerank" => 8, 
                        "natlscale" => 5
                    ],
                    'geometry' => [ 
                        "type" => "Point", 
                        "coordinates" => [
                            $visitor->longitude, 
                            $visitor->latitude
                        ]                      
                    ]                  
                ];
            }
            // dd(json_encode($geojson));
            return json_encode($geojson);
        }
        file_put_contents('geojson/generated.geojson', generate_geojson());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function show(Visitor $visitor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function edit(Visitor $visitor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Visitor $visitor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visitor $visitor)
    {
        //
    }
}

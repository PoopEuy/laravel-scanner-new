<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\T_frame;

class T_FrameController extends Controller
{
    public function getFrame(Request $request)
    {
        $data_frame = T_frame::orderBy('frame_sn', 'asc')->get();
        // dd($data_frame); // Uncomment if you want to dump and die for debugging
        return response()->json([
            'status' => 'success',
            'data' => $data_frame
        ]);
    }

    //  public function getFramesBySN(Request $request)
    // {

    //     // Retrieve frame_sn from request body
    //     $frame_sn = $request->input('frame_sn');
        

    //     // Query database to find frames with the provided frame_sn
    //     $frames = T_frame::where('frame_sn', $frame_sn)->get();

    //     // Check if frames were found
    //     if ($frames->isEmpty()) {
    //         return response()->json([
    //             'status' => 'error',
    //             'message' => 'No frames found with the given frame_sn'
    //         ], 404);
    //     }

    //     // Return success response with frames data
    //     return response()->json([
    //         'status' => 'success',
    //         'data' => $frames
    //     ]);
    // }

    public function getFramesBySN(Request $request, $frame_sn)
    {
        $frame_data = T_frame::where('frame_sn', $frame_sn)->first();
        // return view('frame_batt')->with([
        //     'data'=>$frame_batt
        // ]);
        // dd($frame_data);
        return response()->json($frame_data);
        // echo $frame_batt ;

    }

    public function createFrame(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'frame_sn' => 'required|string|max:255',
            'frame_code' => 'required|string|max:255',
        ]);

        // Create a new instance of T_frame model
        $frame = new T_frame();
        $frame->frame_sn = $request->frame_sn;
        $frame->frame_code = $request->frame_code;
        $frame->image = $request->frame_sn . '.jpg';
        $frame->ts = now(); // Set created_at timestamp

        // Save the frame
        $frame->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Frame created successfully',
            'data' => $frame,
        ], 201); // HTTP status code 201 for created
    }
    
    public function createBulkFrame(Request $request)
    {
        $frames = [];
        // Iterate over each item in the 'data' array
        foreach ($request->data as $item) {
            // Create a new instance of T_frame model
            $frame = new T_frame();
            $frame->frame_sn = (string) $item['frame_sn']; // Ensure frame_sn is cast to string
            $frame->frame_code = (string) $item['frame_code'];
            $frame->ts = now(); // Set created_at timestamp

            // Save the frame
            $frame->save();

            // Add created frame to the frames array
            $frames[] = $frame;
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Frames created successfully',
            'data' => $frames,
        ], 201); // HTTP status code 201 for created
    }


}

<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Booking;

class BookingController extends Controller
{
    /**
     * [For creating booking requests]
     * @return [json] [unique reference id]
     */
    public function create(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'type' => 'required|string|in:standard,premium'
        ]);

        $model = new Booking;
        $model->name = $request->name;
        $model->email = $request->email;
        $model->type = $request->type;
        $model->reference_id = \Str::random(50);
    	$model->save();

        return response()->json(['status' => true, 'data' => ['reference_id' => $model->reference_id]]);
    }

    /**
     * [For listing booking requests]
     * @return [json] [list of booking]
     */
    public function list() {
    	$list = Booking::get();
        return response()->json(['status' => true, 'data' => $list]);
    }

    /**
     * [For marking booking requests as accepted or cancelled]
     * @return [json] [unique reference id]
     */
    public function mark(Request $request) {
        $request->validate([
            'reference_id' => 'required|string|exists:bookings,reference_id',
            'status' => 'required|string|in:accepted,cancelled'
        ]);

        $model = Booking::where('reference_id', $request->reference_id)->first();
        if($model) {
            $model->status = $request->status;
        }
        $model->save();

        return response()->json(['status' => true, 'message' => 'The booking has been ' . $request->status ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\StatisticsView;
use App\Models\Acara;
use Illuminate\Http\Request;

class StatisticsViewController extends Controller
{
    public function statisticsGet(Request $request)
    {
        
        $month = [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ];
        $monthLengkap = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December'
        ];

        $title = 'View Daily';
        $categoriesName = [];
        $value = [];

        if(!isset($request->mode) || $request->mode == 'daily'){
            $title = 'View Daily';
            $days = cal_days_in_month(CAL_GREGORIAN, date($request->month), date($request->year));
            for($a = 0; $a < $days; $a++){
                $categoriesName[$a] = ($a+1)." ".$month[$request->month-1]." ".$request->year;
                $data = StatisticsView::where('date', $request->year."-".$request->month."-".($a+1)." 00:00:00")->first();
                $value[$a] = 0;
                if($data){
                    $value[$a] += $data->totalViews;
                }
            }
        }
        else if($request->mode == 'weekly'){
            $title = 'View Weekly';
            
            for($a = 0; $a < 4; $a++){
                $categoriesName[$a] = "Week ".($a+1)." ".$month[$request->month-1]." ".$request->year;
                $value[$a] = 0;
                for($b=$a*7; $b<$a*7+7; $b++){
                    $data = StatisticsView::where('date', $request->year."-".$request->month."-".($b+1)." 00:00:00")->first();
                    $value[$a] += $data ? $data->totalViews : 0;
                }
                if($a==3){
                    $days = cal_days_in_month(CAL_GREGORIAN, date($request->month), date($request->year));
                    for($b=28; $b<$days; $b++){
                        $data = StatisticsView::where('date', $request->year."-".$request->month."-".($b+1)." 00:00:00")->first();
                        $value[$a] += $data ? $data->totalViews : 0;
                    }
                }
            }
        }
        else if($request->mode == 'monthly'){
            $title = 'View Monthly';
            
            for($a = 0; $a < 12; $a++){
                $categoriesName[$a] = $monthLengkap[$a]." ".$request->year;
                
                $days = cal_days_in_month(CAL_GREGORIAN, date($a+1), date($request->year));
                $value[$a] = 0;
                for($b=0; $b<$days; $b++){
                    $data = StatisticsView::where('date', $request->year."-".($a+1)."-".($b+1)." 00:00:00")->first();
                    $value[$a] += $data ? $data->totalViews : 0;
                }
            }

        }
        return response()->json([
            'title' => $title,
            'categoriesName' => $categoriesName,
            'value' => $value
        ]);
        
    }
    
    public function acaraget(Request $request)
    {
        if($request->eventCount){
            $eventCounts = [];
            for($a=0; $a<32; $a++){        
                if($request->date){
                    $acaras1 = Acara::where('start_acara_date', '<=' , $request->date."-".($a+1)." 00:00:00")->where('end_acara_date', '>=' ,$request->date."-".($a+1)." 00:00:00")->get();
                    $acaras2 = Acara::where('start_acara_date', '=' , $request->date."-".($a+1)." 00:00:00")->where('end_acara_date', '=' , null)->get();
                }
                else{
                    $acaras1 = Acara::where('start_acara_date', '<=' , date('Y-m-').($a+1)." 00:00:00")->where('end_acara_date', '>=' ,date('Y-m-').($a+1)." 00:00:00")->get();
                    $acaras2 = Acara::where('start_acara_date', '=' , date('Y-m-').($a+1)." 00:00:00")->where('end_acara_date', '=' , null)->get();
                }
                // dd($acaras1 );
                $acaras = [];
                $arr = 0;
                foreach($acaras1 as $acara1){
                    $acaras[$arr++] = $acara1; 
                }
                foreach($acaras2 as $acara2){
                    $acaras[$arr++] = $acara2; 
                }
                $acaras = collect($acaras);

                $eventCounts[$a] = $acaras->count();
            }
            return response()->json(['date' => $request->date, 'eventCount' => $eventCounts]);
        }
        
        $acaras1 = Acara::where('start_acara_date', '<=' , $request->date." 00:00:00")->where('end_acara_date', '>=' ,$request->date." 00:00:00")->get();
        $acaras2 = Acara::where('start_acara_date', '=' , $request->date." 00:00:00")->where('end_acara_date', '=' , null)->get();
        
        $acaras = [];
        $arr = 0;
        foreach($acaras1 as $acara1){
            $acaras[$arr++] = $acara1; 
        }
        foreach($acaras2 as $acara2){
            $acaras[$arr++] = $acara2; 
        }
        $acaras = collect($acaras);
        // dd($acaras);
        return response()->json(['acara' => $acaras]);
    }

}

<?php

namespace App\Exports;

use App\Models\Team;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class ParticipantsExport implements FromView, ShouldAutoSize, WithDrawings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
    }

    public function data()
    {
        $teams = Team::all();
        $payloads = [];
        $headers = ['name', 'phone_number', 'email', 'alergi', 'student_photo'];

        foreach ($teams as $team) {
            $temp = [];
            foreach($headers as $header) {
                $items = [];
                foreach ($team->participants as $participant) {
                    $items[] = $participant[$header];
                }

                if ($header == 'name') {
                    $temp += [$team->school_name => $items];
                } else {
                    $temp += [$header => $items];
                }
            }

            $payloads += [$team->name => $temp];
        }
        return $payloads;
    }

    public function view() : View
    {
//        $teams = Team::all();
//        $payloads = [];
//        $headers = ['name', 'phone_number', 'email', 'alergi', 'student_photo'];
//
//        foreach ($teams as $team) {
//            $temp = [];
//            foreach($headers as $header) {
//                $items = [];
//                foreach ($team->participants as $participant) {
//                    $items[] = $participant[$header];
//                }
//
//                if ($header == 'name') {
//                    $temp += [$team->name => $items];
//                } else {
//                    $temp += [$header => $items];
//                }
//            }
//
//            $payloads += [$team->school_name => $temp];
//        }
        $payloads = $this->data();

//        dd($payloads);


        return view('admin.download.participant', compact('payloads'));
    }

    public function drawings()
    {
        // TODO: Implement drawings() method.
        $payloads = $this->data();
        $drawings = [];
        $row = 6;
        foreach ($payloads as $school => $payload) {
            $coors = ["D", "E", "F"];
            $currPos = 0;
            foreach ($payload as $header => $items) {
                if ($header == 'student_photo') {
                    foreach ($items as $item) {
                        $drawing = new Drawing();
                        $drawing->setPath(storage_path('app/public/') . $item);
                        $drawing->setHeight(50);
                        $drawing->setWidth(120);
                        $drawing->setCoordinates($coors[$currPos] . $row);
                        $drawings[] = $drawing;
                        $currPos++;
                    }
                }
            }
            $row += 5;
        }

        return $drawings;
    }
}

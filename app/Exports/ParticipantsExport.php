<?php

namespace App\Exports;

use App\Models\Team;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ParticipantsExport implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
    }

    public function view() : View
    {
        $teams = Team::all();
        $payloads = [];
        $headers = ['name', 'phone_number', 'email', 'student_photo'];

        foreach ($teams as $team) {
            $temp = [];
            foreach($headers as $header) {
                $items = [];
                foreach ($team->participants as $participant) {
                    $items[] = $participant[$header];
                }

                if ($header == 'name') {
                    $temp += [$team->name => $items];
                } else {
                    $temp += [$header => $items];
                }
            }

            $payloads += [$team->school_name => $temp];
        }

        //print_r($payload);


        return view('admin.download.participant', compact('payloads'));
    }
}

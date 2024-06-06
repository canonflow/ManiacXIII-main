<?php

namespace App\Exports;

use App\Models\Team;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

define('ALLOWED', ['verified']);
define('TITLE', [
   'verified' => 'sudah bayar',
   'waiting' => 'belum bayar'
]);

class ParticipantsExport implements FromView, ShouldAutoSize, WithDrawings, WithTitle
{
    private $status;
    public function __construct($status = 'verified')
    {
        $this->status = $status;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
    }

    public function data()
    {
        // Ambil Team yg udh terverifikasi
        $listTeamIdSandbox = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20];
        $teams = Team::where('status', $this->status)
                    ->whereNotIn('id', $listTeamIdSandbox)
                    ->get();
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

    public function title(): string
    {
        return strtoupper(TITLE[$this->status]);
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
        // Kalo cuma waiting, gk perlu nampilin gambar
        if (!in_array($this->status, ALLOWED)) return [];
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
                        $drawing->setHeight(60);
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

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Score extends Model
{
    use HasFactory;

    protected $fillable = [
        'rally_game_id',
        'player_id',
        'point_id'
    ];

    public function rallyGame() : BelongsTo {
        return $this->belongsTo(RallyGame::class, 'rally_game_id');
    }

    public function player() : BelongsTo {
        return $this->belongsTo(Player::class, 'player_id');
    }

    public function point() : BelongsTo {
        return $this->belongsTo(Point::class, 'point_id');
    }

    public static function getExchangeDragonBreath(string $type, string $prevState, string $newState)
    {
        // $type = Tipe Pos Rally
        // $prevState = Point sebelum di-update
        // $nextState = Point yg aka di-update
        /*
         * Single => Menang 1DB, kalah 0DB
         * Battle => Menang 2DB, Seri 1DB, Kalah 0DB
         * Dungeon => Menang 2DB, Seti 1DB, Kalan 0DB
         * */
        $res = [
            'single' => [
                'full' => [
                    'half' => -1,
                    'empty' => -1,
                ],
                'half' => [
                    'full' => 1,
                    'empty' => 0,
                ],
                'empty' => [
                    'full' => 1,
                    'half' => 0,
                ]
            ],
            'battle' => [
                'full' => [
                    'half' => -1,
                    'empty' => -2
                ],
                'half' => [
                    'full' => 1,
                    'empty' => -1
                ],
                'empty' => [
                    'full' => 2,
                    'half' => 1,
                ]
            ],
            'dungeon' => [
                'full' => [
                    'half' => -1,
                    'empty' => -2
                ],
                'half' => [
                    'full' => 1,
                    'empty' => -1
                ],
                'empty' => [
                    'full' => 2,
                    'half' => 1,
                ]
            ]
        ];

//        return $res[$type][$prevState];
        return $res[$type][$prevState][$newState];
    }

    public static function getDeleteDragonBreath($type, $state)
    {
        $res = [
            'single' => [
                'full' => 1,
                'half' => 0,
                'empty' => 0,
            ],
            'battle' => [
                'full' => 2,
                'half' => 1,
                'empty' => 0,
            ],
            'dungeon' => [
                'full' => 2,
                'half' => 1,
                'empty' => 0,
            ]
        ];

        return $res[$type][$state];
    }
}

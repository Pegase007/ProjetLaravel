<?php

namespace App\Console\Commands;

use App\Model\Movies;
use App\Model\Notifications;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class MovieInactiv extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'movie:inactiv';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'All inactiv movies and handle notifications';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $movies=Movies::where('visible','=','0')->get();



        DB::connection('mongodb')->collection('notifications')->delete();

        dump($movies->count());
//
//        foreach ($movies as $movie) {
//
//
//            if ($movie->visible == 0) {
//
//                $notification = new Notifications();
//                $notification->category = $movie->toArray();
//                $notification->message = "La catégorie {$movie->title} est invisible";
//                $notification->criticity = "warning";
//                $notification->save();
//
//            }
//
//
//        }
    }


}

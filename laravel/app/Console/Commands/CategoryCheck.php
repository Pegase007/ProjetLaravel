<?php

namespace App\Console\Commands;

use App\Model\Categories;
use App\Model\Notifications;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CategoryCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'category:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'All checks in categories and handle notifications';

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
//        $confirm = $this->argument('confirm');

        $categories=Categories::all();
//
//        if($confirm=="false") {
//
//            if($this->confirm('Do you wish to continue? [y][N]')) {c
                DB::connection('mongodb')->collection('notifications')->delete();

                foreach ($categories as $categorie) {


                    if ($categorie->movies->isEmpty()) {

                        $notification = new Notifications();
                        $notification->category = $categorie->toArray();
                        $notification->message = "La catégorie {$categorie->title} est vide";
                        $notification->criticity = "warning";
                        $notification->save();

                    }


                }
            }
//        }
//    }
}

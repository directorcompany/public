<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\City;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class Cities extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:cities';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cities from HH.ru API';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //

        $response = Http::get('https://api.hh.ru/areas');
        $cities = $response->json();
        
        foreach ($cities as $country) {
            if ($country['id'] == '113') { 
                foreach ($country['areas'] as $region) {
                    
                    $this->store($region['name']);
        
                    foreach ($region['areas'] as $city) {
                        $this->store($city['name']);
                    }
                }
            }
        }
        
        $this->info('Успешно выполнено.');
    }
    
    public function store($name) {
        
        $str = Str::slug($name);
        $bool = City::where('slug',$str)->first();
        if(!$bool) {
        City::create([
            'name' => $name, 
            'slug' => $str
        ]);
    }
    }
}

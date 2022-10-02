<?php

namespace App\Console\Commands;

use App\Models\wifi;
use App\Models\mikrotik;
use Illuminate\Console\Command;

class kouta extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kouta';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $mikrotik = new mikrotik();
        $mikrotik->connect();
        $datamikrotiks = $mikrotik->comm('/ip/hotspot/user/print');

        foreach (wifi::all() as $data) {
            if ($data['kouta'] > 0) {
                $data['kouta'] = $data['kouta'] - 1;
                $kouta = ['kouta' => $data['kouta']];
                wifi::where('id', $data->id)->update($kouta);
            } else {
                foreach ($datamikrotiks as $datamikrotik) {
                    if ($datamikrotik['name'] == $data['nis']) {
                        $mikrotik->disable($datamikrotik['.id']);
                    }
                }
            }
        }
    }
}

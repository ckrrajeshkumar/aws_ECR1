<?php

namespace App\Console\Commands;

use App\Models\Tenant;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class TenantOnboard extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:tenant-onboard';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Tenant Onboard';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $mainDomain = env('MAIN_DOMAIN', 'isportz.loc');
        $subdomain = $this->ask("Enter the subdomain");
        if ($subdomain) {
            $tenant = Tenant::create(['id' => $subdomain]);
            $tenant->domains()->create(['domain' => $subdomain.'.'.$mainDomain]);
            $this->line("Tenant Created:");
            $this->table(['Domain', 'Tenant ID'], [[$subdomain.'.'.$mainDomain, $tenant->id]]);
        } else {
            $this->error("Subdomain is required to proceed further!");
        }
    }
}

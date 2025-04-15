<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Document;
use App\Policies\DocumentPolicy;
use Illuminate\Support\Facades\Gate;
class AppServiceProvider extends ServiceProvider
{

protected $policies = [
    Document::class => DocumentPolicy::class,
];

    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        
            $this->registerPolicies();
    
            // Tu peux aussi définir des Gates ici si besoin
        
    }
}

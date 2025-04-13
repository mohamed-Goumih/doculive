<?php

namespace App\Console\Commands;

use App\Models\Document;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class CleanOldDocuments extends Command
{
    protected $signature = 'documents:clean-old';
    protected $description = 'Supprime les documents vieux de plus d’un mois';

    public function handle()
    {
        $oldDocs = Document::where('created_at', '<', now()->subMonth())->get();

        foreach ($oldDocs as $doc) {
            Storage::delete($doc->file_path);
            $doc->delete();
        }

        $this->info($oldDocs->count() . ' documents supprimés.');
    }
}

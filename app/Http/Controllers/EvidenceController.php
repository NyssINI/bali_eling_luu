<?php

namespace App\Http\Controllers;

use App\Models\ActionEvidence;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class EvidenceController extends Controller
{
    /**
     * Tampilkan bukti private hanya untuk pemilik atau admin.
     */
    public function show(ActionEvidence $evidence): Response
    {
        $submission = $evidence->submission;

        if (! $submission) {
            abort(404);
        }

        $this->authorize('view', $submission);

        if (! Storage::disk('local')->exists($evidence->path)) {
            abort(404, 'Bukti tidak ditemukan.');
        }

        return Storage::disk('local')->response($evidence->path);
    }
}

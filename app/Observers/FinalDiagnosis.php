<?php

namespace App\Observers;

class FinalDiagnosis
{
    public function creating (\App\Models\FinalDiagnosis $fd) {
        $fd->doctor_id = auth()->id();

    }
}

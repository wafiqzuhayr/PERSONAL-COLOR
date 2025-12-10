<?php

namespace App\Services;

class ColorAnalysisService
{
    public function generateResult($skinTone, $undertone)
    {
        if ($skinTone === 'fair' && $undertone === 'cool') {
            return "❄ Winter Cool Tone";
        }

        if ($skinTone === 'tan' && $undertone === 'warm') {
            return "☀ Summer Warm Tone";
        }

        return "🌸 Neutral Tone";
    }
}

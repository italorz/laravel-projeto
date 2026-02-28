<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PlacaValidation implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $uppercase = strtoupper($value);

        // Formato antigo XXX0000 OU formato novo XXX0X00
        $formatoAntigo = preg_match('/^[A-Z]{3}[0-9]{4}$/', $uppercase);
        $formatoNovo = preg_match('/^[A-Z]{3}[0-9]{1}[A-Z]{1}[0-9]{2}$/', $uppercase);

        if (!$formatoAntigo && !$formatoNovo) {
            $fail('A placa deve estar no formato XXX0000 (antigo) ou XXX0X00 (Mercosul).');
        }
    }
}

<?php

namespace App\Traits;

use Illuminate\Validation\Validator;

trait JobTypeValidation
{
    public function validateJobType(Validator $validator)
    {
        $validator->after(function ($validator) {
            $jobType = $this->job_type;
            $salary = $this->salary;
            $hours = $this->work_hours;

            if ($jobType === 'CLT' && ($salary === null || $salary < 1212 || $hours === null)) {
                $validator->errors()->add('job_type', 'CLT requires a minimum salary of 1212 and work hours.');
            }

            if ($jobType === 'Estagio') {
                if ($salary === null) {
                    $validator->errors()->add('salary', 'Estagio requires a salary.');
                }
                if ($hours === null || $hours > 6) {
                    $validator->errors()->add('work_hours', 'Estagio must have a maximum of 6 hours.');
                }
            }
        });
    }
}

<?php

namespace App\Models;

class Job {
    public static function all(): array{
        return [['id' => 1, 'title' => 'Director', 'salary' => '$50,000'], ['id' => 2, 'title' => 'Janitor', 'salary' => '$10,000'], ['id' => 3, 'title' => 'Security', 'salary' => '$20,000']];

    }
}
<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Report;

class ReportUITest extends TestCase
{
    public function test_report_index_ui()
    {
        $response = $this->get('/reports');
        $response->assertSee('Reports');
    }

    public function test_report_create_ui()
    {
        $response = $this->get('/reports/create');
        $response->assertSee('Create Report');
    }
}

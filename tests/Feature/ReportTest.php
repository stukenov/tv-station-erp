<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Report;

class ReportTest extends TestCase
{
    public function test_report_index()
    {
        $response = $this->get('/reports');
        $response->assertStatus(200);
    }

    public function test_report_create()
    {
        $response = $this->get('/reports/create');
        $response->assertStatus(200);
    }

    public function test_report_store()
    {
        $response = $this->post('/reports', [
            'title' => 'Test Report',
            'data' => json_encode(['key' => 'value']),
        ]);

        $response->assertRedirect('/reports');
        $this->assertDatabaseHas('reports', ['title' => 'Test Report']);
    }

    public function test_report_update()
    {
        $report = Report::factory()->create();
        $response = $this->put("/reports/{$report->id}", [
            'title' => 'Updated Report',
            'data' => json_encode(['key' => 'new_value']),
        ]);

        $response->assertRedirect('/reports');
        $this->assertDatabaseHas('reports', ['title' => 'Updated Report']);
    }

    public function test_report_delete()
    {
        $report = Report::factory()->create();
        $response = $this->delete("/reports/{$report->id}");

        $response->assertRedirect('/reports');
        $this->assertDatabaseMissing('reports', ['id' => $report->id]);
    }
}

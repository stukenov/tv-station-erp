public function run()
{
    \App\Models\Payment::factory(50)->create();
}

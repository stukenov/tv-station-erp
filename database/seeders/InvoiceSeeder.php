public function run()
{
    \App\Models\Invoice::factory(50)->create();
}

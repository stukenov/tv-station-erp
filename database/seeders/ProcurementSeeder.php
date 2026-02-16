public function run()
{
    \App\Models\Procurement::factory(50)->create();
}

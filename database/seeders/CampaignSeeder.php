public function run()
{
    \App\Models\Campaign::factory(50)->create();
}

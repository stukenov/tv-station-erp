public function run()
{
    \App\Models\Inventory::factory(50)->create();
}

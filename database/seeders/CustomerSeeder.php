public function run()
{
    \App\Models\Customer::factory(50)->create();
}

public function run()
{
    \App\Models\Expense::factory(50)->create();
}

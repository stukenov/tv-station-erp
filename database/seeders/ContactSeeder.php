public function run()
{
    \App\Models\Contact::factory(100)->create();
}

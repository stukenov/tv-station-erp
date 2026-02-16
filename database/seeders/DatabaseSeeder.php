<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            DepartmentSeeder::class,
            UserSeeder::class,
            EmployeeSeeder::class,

            TvShowSeeder::class,
            EpisodeSeeder::class,
            ScheduleSeeder::class,
            AdvertiserSeeder::class,
            AdvertisementSeeder::class,
            RatingSeeder::class,
            StaffSeeder::class,
            CustomerSeeder::class,
            ContactSeeder::class,
            SaleSeeder::class,
            CampaignSeeder::class,
            ReportSeeder::class,
            InvoiceSeeder::class,
            ExpenseSeeder::class,
            BudgetSeeder::class,
            PaymentSeeder::class,
            TaxSeeder::class,
            AssetSeeder::class,
            InventorySeeder::class,
            ProcurementSeeder::class,
            // Add other seeders here
        ]);
    }
}

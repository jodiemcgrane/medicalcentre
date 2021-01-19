<?php
# @Date:   2020-11-19T13:36:25+00:00
# @Last modified time: 2021-01-18T13:58:19+00:00




namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InsuranceCompany;

class InsuranceCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $insurance_company = new InsuranceCompany();
        $insurance_company->name = "VHI Healthcare";
        $insurance_company->save();

        $insurance_company = new InsuranceCompany();
        $insurance_company->name = "Laya Healthcare";
        $insurance_company->save();

        $insurance_company = new InsuranceCompany();
        $insurance_company->name = "Irish Life Health";
        $insurance_company->save();

        $insurance_company = new InsuranceCompany();
        $insurance_company->name = "HSF Health Plan";
        $insurance_company->save();

        for ($i = 1; $i <= 5; $i++) {
          $insurance_company = InsuranceCompany::factory()->create();
        }
    }
}

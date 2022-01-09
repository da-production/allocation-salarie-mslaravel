<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WilayaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

                //
                $wilayas = [
                    [ 'code'=> '01','libelle_fr'=>'ADRAR' ,'libelle_ar'=>'أدرار'],
                    [ 'code'=> '02','libelle_fr'=>'CHLEF','libelle_ar'=>'الشلف'],
                    [ 'code'=> '03','libelle_fr'=>'LAGHOUAT','libelle_ar'=>'الأغواط'],
                    [ 'code'=> '04','libelle_fr'=>'OUM EL BOUAGHI','libelle_ar'=>'أم البواقي	'],
                    [ 'code'=> '05','libelle_fr'=>'BATNA','libelle_ar'=>'باتنة'],
                    [ 'code'=> '06','libelle_fr'=>'BEJAIA','libelle_ar'=>'بجاية'],
                    [ 'code'=> '07','libelle_fr'=>'BISKRA','libelle_ar'=>'بسكرة'],
                    [ 'code'=> '08','libelle_fr'=>'BECHAR','libelle_ar'=>'بشار'],
                    [ 'code'=> '09','libelle_fr'=>'BLIDA','libelle_ar'=>'البليدة'],
                    [ 'code'=> '10','libelle_fr'=>'BOUIRA','libelle_ar'=>'البويرة'],	
                    [ 'code'=> '11','libelle_fr'=>'TAMANRASSET','libelle_ar'=>'تامنغست'],
                    [ 'code'=> '12','libelle_fr'=>'TEBESSA','libelle_ar'=>'تبسة'],
                    [ 'code'=> '13','libelle_fr'=>'TLEMCEN','libelle_ar'=>'تلمسان'],
                    [ 'code'=> '14','libelle_fr'=>'TIARET','libelle_ar'=>'تيارت'],
                    [ 'code'=> '15','libelle_fr'=>'TIZI-OUZOU','libelle_ar'=>'تيزى وزو'],
                    [ 'code'=> '16','libelle_fr'=>'ALGER','libelle_ar'=>'الجزائر'],
                    [ 'code'=> '17','libelle_fr'=>'DJELFA','libelle_ar'=>'الجلفة'],
                    [ 'code'=> '18','libelle_fr'=>'JIJEL','libelle_ar'=>'جيجل'],
                    [ 'code'=> '19','libelle_fr'=>'SETIF','libelle_ar'=>'سطيف'],
                    [ 'code'=> '20','libelle_fr'=>'SAIDA','libelle_ar'=>'سعيدة'],
                    [ 'code'=> '21','libelle_fr'=>'SKIKDA','libelle_ar'=>'سكيكدة	'],
                    [ 'code'=> '22','libelle_fr'=>'SIDI BEL ABBES','libelle_ar'=>'سيدي بلعباس'],
                    [ 'code'=> '23','libelle_fr'=>'ANNABA','libelle_ar'=>'عنابة'],
                    [ 'code'=> '24','libelle_fr'=>'GUELMA','libelle_ar'=>'قالمة	'],
                    [ 'code'=> '25','libelle_fr'=>'CONSTANTINE','libelle_ar'=>'قسنطينة'],
                    [ 'code'=> '26','libelle_fr'=>'MEDEA','libelle_ar'=>'المدية'],
                    [ 'code'=> '27','libelle_fr'=>'MOSTAGANEM','libelle_ar'=>'مستغانم'],
                    [ 'code'=> '28','libelle_fr'=>'MSILA','libelle_ar'=>'المسيلة'],
                    [ 'code'=> '29','libelle_fr'=>'MASCARA','libelle_ar'=>'معسكر	'],
                    [ 'code'=> '30','libelle_fr'=>'OUARGLA','libelle_ar'=>'ورقلة'],
                    [ 'code'=> '31','libelle_fr'=>'ORAN','libelle_ar'=>'وهران'],
                    [ 'code'=> '32','libelle_fr'=>'EL BAYADH','libelle_ar'=>'البيض'],
                    [ 'code'=> '33','libelle_fr'=>'ILLIZI','libelle_ar'=>'ايليزى'],
                    [ 'code'=> '34','libelle_fr'=>'BORDJ BOUARRERIDJ','libelle_ar'=>'برج بوعريرج	'],
                    [ 'code'=> '35','libelle_fr'=>'BOUMERDES','libelle_ar'=>'بومرداس	'],
                    [ 'code'=> '36','libelle_fr'=>'EL TARF','libelle_ar'=>'الطارف'],
                    [ 'code'=> '37','libelle_fr'=>'TINDOUF','libelle_ar'=>'تندوف'],
                    [ 'code'=> '38','libelle_fr'=>'TISSEMSILT','libelle_ar'=>'تيسمسيلت'],
                    [ 'code'=> '39','libelle_fr'=>'EL OUED','libelle_ar'=>'الوادى'],
                    [ 'code'=> '40','libelle_fr'=>'KHENCHLA','libelle_ar'=>'خنشلة'],
                    [ 'code'=> '41','libelle_fr'=>'SOUK AHRAS','libelle_ar'=>'سوق أهراس'],
                    [ 'code'=> '42','libelle_fr'=>'TIPAZA','libelle_ar'=>'تيبازة'],
                    [ 'code'=> '43','libelle_fr'=>'MILA','libelle_ar'=>'ميلة'],
                    [ 'code'=> '44','libelle_fr'=>'AIN DEFLA','libelle_ar'=>'عين الدفلى	'],
                    [ 'code'=> '45','libelle_fr'=>'NAAMA','libelle_ar'=>'النعامة	'],
                    [ 'code'=> '46','libelle_fr'=>'AIN TEMOUCHENT','libelle_ar'=>'عين تموشنت'],
                    [ 'code'=> '47','libelle_fr'=>'GHARDAIA','libelle_ar'=>'غرداية'],
                    [ 'code'=> '48','libelle_fr'=>'RELIZANE','libelle_ar'=>'غليزان'],
                ];
        
                DB::table('wilayas')->insert($wilayas);
    }
}

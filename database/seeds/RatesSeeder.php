<?php

use Illuminate\Database\Seeder;

class RatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('BPI_rates')->insert([
        	'start' => 0,
        	'end' => 239,
        	'rate' => 0
        ]);

        DB::table('BPI_rates')->insert([
        	'start' => 240,
        	'end' => 254,
        	'rate' => 0.50
        ]);

        DB::table('BPI_rates')->insert([
        	'start' => 255,
        	'end' => 269,
        	'rate' => 1.00
        ]);

        DB::table('BPI_rates')->insert([
        	'start' => 270,
        	'end' => 284,
        	'rate' => 1.50
        ]);

        DB::table('BPI_rates')->insert([
        	'start' => 285,
        	'end' => 299,
        	'rate' => 2.00
        ]);

        DB::table('BPI_rates')->insert([
        	'start' => 300,
        	'end' => 314,
        	'rate' => 3.00
        ]);

        DB::table('BPI_rates')->insert([
        	'start' => 315,
        	'end' => 500,
        	'rate' => 4.00
        ]);

     	//FCRi Rates
     	DB::table('FCRi_rates')->insert([
        	'start' => 0,
        	'end' => 1.650,
        	'rate' => 1.00
        ]); 

        DB::table('FCRi_rates')->insert([
        	'start' => 1.651,
        	'end' => 1.700,
        	'rate' => 0.75
        ]); 

        DB::table('FCRi_rates')->insert([
        	'start' => 1.701,
        	'end' => 1.750,
        	'rate' => 0.50
        ]); 

        DB::table('FCRi_rates')->insert([
            'start' => 1.751,
            'end' => 3.000,
            'rate' => 0.00
        ]); 

        //FCR Rates
        DB::table('FCR_rates')->insert([
            'start' => 1.0001,
            'end' => 1.0100,
            'rate' => 17.23
        ]);

        DB::table('FCR_rates')->insert([
            'start' => 1.0101,
            'end' => 1.0200,
            'rate' => 17.07
        ]);

        DB::table('FCR_rates')->insert([
            'start' => 1.0201,
            'end' => 1.0300,
            'rate' => 16.91
        ]);

        DB::table('FCR_rates')->insert([
            'start' => 1.0301,
            'end' => 1.0400,
            'rate' => 16.75
        ]);

        DB::table('FCR_rates')->insert([
            'start' => 1.0401,
            'end' => 1.0500,
            'rate' => 16.59
        ]);

        DB::table('FCR_rates')->insert([
            'start' => 1.0501,
            'end' => 1.0600,
            'rate' => 16.43
        ]);

        DB::table('FCR_rates')->insert([
            'start' => 1.0601,
            'end' => 1.0700,
            'rate' => 16.27
        ]);

        DB::table('FCR_rates')->insert([
            'start' => 1.0701,
            'end' => 1.0800,
            'rate' => 16.11
        ]);

        DB::table('FCR_rates')->insert([
            'start' => 1.0801,
            'end' => 1.0900,
            'rate' => 15.95
        ]);

        DB::table('FCR_rates')->insert([
            'start' => 1.0901,
            'end' => 1.1000,
            'rate' => 15.79
        ]);

        DB::table('FCR_rates')->insert([
            'start' => 1.1001,
            'end' => 1.1100,
            'rate' => 15.63
        ]);

        DB::table('FCR_rates')->insert([
            'start' => 1.1101,
            'end' => 1.1200,
            'rate' => 15.47
        ]);

        DB::table('FCR_rates')->insert([
            'start' => 1.1201,
            'end' => 1.1300,
            'rate' => 15.31
        ]);

        DB::table('FCR_rates')->insert([
            'start' => 1.1301,
            'end' => 1.1400,
            'rate' => 15.15
        ]);

        DB::table('FCR_rates')->insert([
            'start' => 1.1401,
            'end' => 1.1500,
            'rate' => 14.99
        ]);

        DB::table('FCR_rates')->insert([
            'start' => 1.1501,
            'end' => 1.1600,
            'rate' => 14.83
        ]);

        DB::table('FCR_rates')->insert([
            'start' => 1.1601,
            'end' => 1.1700,
            'rate' => 14.67
        ]);

        DB::table('FCR_rates')->insert([
            'start' => 1.1701,
            'end' => 1.1800,
            'rate' => 14.51
        ]);

        DB::table('FCR_rates')->insert([
            'start' => 1.1801,
            'end' => 1.1900,
            'rate' => 14.35
        ]);

        DB::table('FCR_rates')->insert([
            'start' => 1.1901,
            'end' => 1.2000,
            'rate' => 14.19
        ]);

        DB::table('FCR_rates')->insert([
            'start' => 1.2001,
            'end' => 1.2100,
            'rate' => 14.03
        ]);

        DB::table('FCR_rates')->insert([
            'start' => 1.2101,
            'end' => 1.2200,
            'rate' => 13.87
        ]);

        DB::table('FCR_rates')->insert([
            'start' => 1.2201,
            'end' => 1.2300,
            'rate' => 13.71
        ]);

        DB::table('FCR_rates')->insert([
            'start' => 1.2301,
            'end' => 1.2400,
            'rate' => 13.55
        ]);

        DB::table('FCR_rates')->insert([
            'start' => 1.2401,
            'end' => 1.2500,
            'rate' => 13.39
        ]);

        DB::table('FCR_rates')->insert([
            'start' => 1.2501,
            'end' => 1.2600,
            'rate' => 13.23
        ]);

        DB::table('FCR_rates')->insert([
            'start' => 1.2601,
            'end' => 1.2700,
            'rate' => 13.07
        ]);

        DB::table('FCR_rates')->insert([
            'start' => 1.2701,
            'end' => 1.2800,
            'rate' => 12.91
        ]);

        DB::table('FCR_rates')->insert([
            'start' => 1.2801,
            'end' => 1.2900,
            'rate' => 12.75
        ]);

        DB::table('FCR_rates')->insert([
            'start' => 1.2901,
            'end' => 1.3000,
            'rate' => 12.59
        ]);

        DB::table('FCR_rates')->insert([
            'start' => 1.3001,
            'end' => 1.3100,
            'rate' => 12.43
        ]);

        DB::table('FCR_rates')->insert([
            'start' => 1.3101,
            'end' => 1.3200,
            'rate' => 12.27
        ]);

        DB::table('FCR_rates')->insert([
            'start' => 1.3201,
            'end' => 1.3300,
            'rate' => 12.11
        ]);

        DB::table('FCR_rates')->insert([
            'start' => 1.3301,
            'end' => 1.3400,
            'rate' => 11.95
        ]);

        DB::table('FCR_rates')->insert([
            'start' => 1.3401,
            'end' => 1.3500,
            'rate' => 11.79
        ]);

        DB::table('FCR_rates')->insert([
            'start' => 1.3501,
            'end' => 1.3600,
            'rate' => 11.63
        ]);

        DB::table('FCR_rates')->insert([
            'start' => 1.3601,
            'end' => 1.3700,
            'rate' => 11.47
        ]);

        DB::table('FCR_rates')->insert([
            'start' => 1.3701,
            'end' => 1.3800,
            'rate' => 11.31
        ]);

        DB::table('FCR_rates')->insert([
            'start' => 1.3801,
            'end' => 1.3900,
            'rate' => 11.15
        ]);

        DB::table('FCR_rates')->insert([
            'start' => 1.3901,
            'end' => 1.4000,
            'rate' => 10.99
        ]);

        DB::table('FCR_rates')->insert([
            'start' => 1.4001,
            'end' => 1.4100,
            'rate' => 10.83
        ]);

        DB::table('FCR_rates')->insert([
            'start' => 1.4101,
            'end' => 1.4200,
            'rate' => 10.67
        ]);

        DB::table('FCR_rates')->insert([
            'start' => 1.4201,
            'end' => 1.4300,
            'rate' => 10.51
        ]);

        DB::table('FCR_rates')->insert([
            'start' => 1.4301,
            'end' => 1.4400,
            'rate' => 10.35
        ]);

        DB::table('FCR_rates')->insert([
            'start' => 1.4401,
            'end' => 1.4500,
            'rate' => 10.19
        ]);

        DB::table('FCR_rates')->insert([
            'start' => 1.4501,
            'end' => 1.4600,
            'rate' => 10.03
        ]);

        DB::table('FCR_rates')->insert([
            'start' => 1.4601,
            'end' => 1.4700,
            'rate' => 9.87
        ]);

        DB::table('FCR_rates')->insert([
            'start' => 1.4701,
            'end' => 1.4800,
            'rate' => 9.71
        ]);

        DB::table('FCR_rates')->insert([
            'start' => 1.4801,
            'end' => 1.4900,
            'rate' => 9.55
        ]);

        DB::table('FCR_rates')->insert([
            'start' => 1.4901,
            'end' => 1.5000,
            'rate' => 9.39
        ]);

        DB::table('FCR_rates')->insert([
            'start' => 1.5001,
            'end' => 1.5100,
            'rate' => 9.23
        ]);

        DB::table('FCR_rates')->insert([
            'start' => 1.5101,
            'end' => 1.5200,
            'rate' => 9.07
        ]);

        DB::table('FCR_rates')->insert([
            'start' => 1.5201,
            'end' => 1.5300,
            'rate' => 8.91
        ]);

        DB::table('FCR_rates')->insert([
            'start' => 1.5301,
            'end' => 1.5400,
            'rate' => 8.75
        ]);

        DB::table('FCR_rates')->insert([
            'start' => 1.5401,
            'end' => 1.5500,
            'rate' => 8.59
        ]);

        DB::table('FCR_rates')->insert([
            'start' => 1.5501,
            'end' => 1.5600,
            'rate' => 8.43
        ]);

        DB::table('FCR_rates')->insert([
            'start' => 1.5601,
            'end' => 1.5700,
            'rate' => 8.27
        ]);

        DB::table('FCR_rates')->insert([
            'start' => 1.5701,
            'end' => 1.5800,
            'rate' => 8.11
        ]);  

        DB::table('FCR_rates')->insert([
            'start' => 1.5801,
            'end' => 1.5900,
            'rate' => 7.95
        ]);  

     	DB::table('FCR_rates')->insert([
        	'start' => 1.5901,
        	'end' => 1.6000,
        	'rate' => 7.79
        ]);  

        DB::table('FCR_rates')->insert([
        	'start' => 1.6001,
        	'end' => 1.6100,
        	'rate' => 7.63
        ]);  

        DB::table('FCR_rates')->insert([
        	'start' => 1.6101,
        	'end' => 1.6200,
        	'rate' => 7.47
        ]);  

        DB::table('FCR_rates')->insert([
        	'start' => 1.6201,
        	'end' => 1.6300,
        	'rate' => 7.31
        ]);  

        DB::table('FCR_rates')->insert([
        	'start' => 1.6301,
        	'end' => 1.6400,
        	'rate' => 7.15
        ]);  

        DB::table('FCR_rates')->insert([
        	'start' => 1.6401,
        	'end' => 1.6500,
        	'rate' => 6.99
        ]);  

        DB::table('FCR_rates')->insert([
        	'start' => 1.6501,
        	'end' => 1.6600,
        	'rate' => 6.83
        ]);  

        DB::table('FCR_rates')->insert([
        	'start' => 1.6601,
        	'end' => 1.6700,
        	'rate' => 6.67
        ]);  

        DB::table('FCR_rates')->insert([
        	'start' => 1.6701,
        	'end' => 1.6800,
        	'rate' => 6.51
        ]);  

        DB::table('FCR_rates')->insert([
        	'start' => 1.6801,
        	'end' => 1.6900,
        	'rate' => 6.35
        ]); 

        DB::table('FCR_rates')->insert([
        	'start' => 1.6901,
        	'end' => 1.7000,
        	'rate' => 6.19
        ]); 

        DB::table('FCR_rates')->insert([
        	'start' => 1.7001,
        	'end' => 1.7100,
        	'rate' => 6.03
        ]); 

        DB::table('FCR_rates')->insert([
        	'start' => 1.7101,
        	'end' => 1.7200,
        	'rate' => 5.87
        ]);

        DB::table('FCR_rates')->insert([
        	'start' => 1.7201,
        	'end' => 1.7300,
        	'rate' => 5.71
        ]);  

        DB::table('FCR_rates')->insert([
        	'start' => 1.7301,
        	'end' => 1.7400,
        	'rate' => 5.55
        ]); 

        DB::table('FCR_rates')->insert([
        	'start' => 1.7401,
        	'end' => 1.7500,
        	'rate' => 5.39
        ]); 

        DB::table('FCR_rates')->insert([
        	'start' => 1.7501,
        	'end' => 1.7600,
        	'rate' => 5.23
        ]); 

        DB::table('FCR_rates')->insert([
        	'start' => 1.7601,
        	'end' => 1.7700,
        	'rate' => 5.07
        ]); 

        DB::table('FCR_rates')->insert([
        	'start' => 1.7701,
        	'end' => 1.7800,
        	'rate' => 4.91
        ]); 

        DB::table('FCR_rates')->insert([
        	'start' => 1.7801,
        	'end' => 1.7900,
        	'rate' => 4.76
        ]); 

        DB::table('FCR_rates')->insert([
        	'start' => 1.7901,
        	'end' => 1.8000,
        	'rate' => 4.61
        ]); 

        DB::table('FCR_rates')->insert([
        	'start' => 1.8001,
        	'end' => 1.8100,
        	'rate' => 4.46
        ]); 

        DB::table('FCR_rates')->insert([
        	'start' => 1.8101,
        	'end' => 1.8200,
        	'rate' => 4.31
        ]); 

        DB::table('FCR_rates')->insert([
        	'start' => 1.8201,
        	'end' => 1.8300,
        	'rate' => 4.16
        ]); 

        DB::table('FCR_rates')->insert([
        	'start' => 1.8301,
        	'end' => 1.8400,
        	'rate' => 4.01
        ]); 

        DB::table('FCR_rates')->insert([
        	'start' => 1.8401,
        	'end' => 1.8500,
        	'rate' => 3.87
        ]); 

        DB::table('FCR_rates')->insert([
        	'start' => 1.8501,
        	'end' => 1.8600,
        	'rate' => 3.73
        ]); 

        DB::table('FCR_rates')->insert([
        	'start' => 1.8601,
        	'end' => 1.8700,
        	'rate' => 3.59
        ]); 

        DB::table('FCR_rates')->insert([
        	'start' => 1.8701,
        	'end' => 1.8800,
        	'rate' => 3.45
        ]); 

        DB::table('FCR_rates')->insert([
        	'start' => 1.8801,
        	'end' => 1.8900,
        	'rate' => 3.31
        ]); 

        DB::table('FCR_rates')->insert([
        	'start' => 1.8901,
        	'end' => 1.9000,
        	'rate' => 3.17
        ]); 

        DB::table('FCR_rates')->insert([
        	'start' => 1.9001,
        	'end' => 1.9100,
        	'rate' => 3.04
        ]); 

        DB::table('FCR_rates')->insert([
        	'start' => 1.9101,
        	'end' => 1.9200,
        	'rate' => 2.91
        ]); 

        DB::table('FCR_rates')->insert([
        	'start' => 1.9201,
        	'end' => 1.9300,
        	'rate' => 2.78
        ]); 

        DB::table('FCR_rates')->insert([
        	'start' => 1.9301,
        	'end' => 1.9400,
        	'rate' => 2.65
        ]); 

        DB::table('FCR_rates')->insert([
        	'start' => 1.9401,
        	'end' => 1.9500,
        	'rate' => 2.52
        ]); 

        DB::table('FCR_rates')->insert([
        	'start' => 1.9501,
        	'end' => 1.9600,
        	'rate' => 2.39
        ]); 

        DB::table('FCR_rates')->insert([
        	'start' => 1.9601,
        	'end' => 1.9700,
        	'rate' => 2.26
        ]); 

        DB::table('FCR_rates')->insert([
        	'start' => 1.9701,
        	'end' => 1.9800,
        	'rate' => 2.13
        ]); 

        DB::table('FCR_rates')->insert([
        	'start' => 1.9801,
        	'end' => 1.9900,
        	'rate' => 2.00
        ]); 

        DB::table('FCR_rates')->insert([
        	'start' => 1.9901,
        	'end' => 2.000,
        	'rate' => 1.87
        ]); 

        DB::table('FCR_rates')->insert([
        	'start' => 2.0001,
        	'end' => 2.0100,
        	'rate' => 1.74
        ]); 

        DB::table('FCR_rates')->insert([
        	'start' => 2.0101,
        	'end' => 2.0200,
        	'rate' => 1.61
        ]); 

        DB::table('FCR_rates')->insert([
        	'start' => 2.0201,
        	'end' => 2.0300,
        	'rate' => 1.47
        ]); 

        DB::table('FCR_rates')->insert([
        	'start' => 2.0301,
        	'end' => 2.0400,
        	'rate' => 1.33
        ]); 

        DB::table('FCR_rates')->insert([
        	'start' => 2.0401,
        	'end' => 2.0500,
        	'rate' => 1.19
        ]); 

        DB::table('FCR_rates')->insert([
        	'start' => 2.0501,
        	'end' => 2.0600,
        	'rate' => 1.05
        ]); 

        DB::table('FCR_rates')->insert([
        	'start' => 2.0601,
        	'end' => 2.0700,
        	'rate' => 0.91
        ]); 

        DB::table('FCR_rates')->insert([
        	'start' => 2.0701,
        	'end' => 2.0800,
        	'rate' => 0.77
        ]); 

        DB::table('FCR_rates')->insert([
        	'start' => 2.0801,
        	'end' => 2.0900,
        	'rate' => 0.62
        ]); 

        DB::table('FCR_rates')->insert([
        	'start' => 2.0901,
        	'end' => 2.1000,
        	'rate' => 0.47
        ]); 

        DB::table('FCR_rates')->insert([
        	'start' => 2.1001,
        	'end' => 2.1100,
        	'rate' => 0.32
        ]); 

        DB::table('FCR_rates')->insert([
        	'start' => 2.1101,
        	'end' => 2.1200,
        	'rate' => 0.17
        ]);

        DB::table('FCR_rates')->insert([
        	'start' => 2.1201,
        	'end' => 2.1300,
        	'rate' => 0.02
        ]); 

        DB::table('FCR_rates')->insert([
        	'start' => 2.1301,
        	'end' => 2.1400,
        	'rate' => -0.13
        ]);

        DB::table('FCR_rates')->insert([
        	'start' => 2.1401,
        	'end' => 2.1500,
        	'rate' => -0.29
        ]);

        DB::table('FCR_rates')->insert([
        	'start' => 2.1501,
        	'end' => 2.1600,
        	'rate' => -0.45
        ]);

        DB::table('FCR_rates')->insert([
        	'start' => 2.1601,
        	'end' => 2.1700,
        	'rate' => -0.61
        ]);

        DB::table('FCR_rates')->insert([
        	'start' => 2.1701,
        	'end' => 2.1800,
        	'rate' => -0.77
        ]);

        DB::table('FCR_rates')->insert([
        	'start' => 2.1801,
        	'end' => 2.1900,
        	'rate' => -0.93
        ]);

        DB::table('FCR_rates')->insert([
        	'start' => 2.1901,
        	'end' => 2.2000,
        	'rate' => -1.09
        ]);

        DB::table('FCR_rates')->insert([
        	'start' => 2.2001,
        	'end' => 2.2100,
        	'rate' => -1.25
        ]);

        DB::table('FCR_rates')->insert([
        	'start' => 2.2101,
        	'end' => 2.2200,
        	'rate' => -1.41
        ]);

        DB::table('FCR_rates')->insert([
        	'start' => 2.2201,
        	'end' => 2.2300,
        	'rate' => -1.52
        ]);

        DB::table('FCR_rates')->insert([
        	'start' => 2.2301,
        	'end' => 2.2400,
        	'rate' => -1.73
        ]);

        DB::table('FCR_rates')->insert([
        	'start' => 2.2401,
        	'end' => 2.2500,
        	'rate' => -1.89
        ]);

        DB::table('FCR_rates')->insert([
        	'start' => 2.2501,
        	'end' => 2.2600,
        	'rate' => -2.05
        ]);

        DB::table('FCR_rates')->insert([
        	'start' => 2.2601,
        	'end' => 2.2700,
        	'rate' => -2.21
        ]);

        DB::table('FCR_rates')->insert([
        	'start' => 2.2701,
        	'end' => 2.2800,
        	'rate' => -2.37
        ]);

        DB::table('FCR_rates')->insert([
        	'start' => 2.2801,
        	'end' => 2.2900,
        	'rate' => -2.53
        ]);

        DB::table('FCR_rates')->insert([
        	'start' => 2.2901,
        	'end' => 2.3000,
        	'rate' => -2.69
        ]);

        DB::table('FCR_rates')->insert([
        	'start' => 2.3001,
        	'end' => 2.3100,
        	'rate' => -2.85
        ]);

        DB::table('FCR_rates')->insert([
        	'start' => 2.3101,
        	'end' => 2.3200,
        	'rate' => -3.01
        ]);

        //ALW Rates
        DB::table('ALW_rates')->insert([
            'start' => 0.00,
            'end' => 0.699,
            'rate' => 0.00
        ]); 

        DB::table('ALW_rates')->insert([
            'start' => 0.700,
            'end' => 1.000,
            'rate' => 2.00
        ]); 

        DB::table('ALW_rates')->insert([
            'start' => 1.001,
            'end' => 1.399,
            'rate' => 2.50
        ]); 

        DB::table('ALW_rates')->insert([
            'start' => 1.400,
            'end' => 1.499,
            'rate' => 3.15
        ]); 

        DB::table('ALW_rates')->insert([
            'start' => 1.500,
            'end' => 1.549,
            'rate' => 3.80
        ]); 

        DB::table('ALW_rates')->insert([
            'start' => 1.550,
            'end' => 5.000,
            'rate' => 5.30
        ]);

        //HR Rates
        DB::table('HR_rates')->insert([
            'start' => 70.00,
            'end' => 89.99,
            'rate' => 0.25
        ]); 

        DB::table('HR_rates')->insert([
            'start' => 90.00,
            'end' => 92.99,
            'rate' => 0.50
        ]); 

        DB::table('HR_rates')->insert([
            'start' => 93.00,
            'end' => 94.99,
            'rate' => 1.00
        ]); 

        DB::table('HR_rates')->insert([
            'start' => 95.00,
            'end' => 95.50,
            'rate' => 1.50
        ]); 

        DB::table('HR_rates')->insert([
            'start' => 95.51,
            'end' => 96.00,
            'rate' => 2.00
        ]);         

        DB::table('HR_rates')->insert([
            'start' => 96.01,
            'end' => 96.50,
            'rate' => 2.25
        ]);  

        DB::table('HR_rates')->insert([
            'start' => 96.51,
            'end' => 97.00,
            'rate' => 2.50
        ]);

        DB::table('HR_rates')->insert([
            'start' => 97.01,
            'end' => 97.50,
            'rate' => 2.75
        ]);    

        DB::table('HR_rates')->insert([
            'start' => 97.51,
            'end' => 98.00,
            'rate' => 3.00
        ]);  

        DB::table('HR_rates')->insert([
            'start' => 98.01,
            'end' => 98.50,
            'rate' => 3.25
        ]);  

        DB::table('HR_rates')->insert([
            'start' => 98.51,
            'end' => 200.00,
            'rate' => 3.50
        ]); 
    }
}

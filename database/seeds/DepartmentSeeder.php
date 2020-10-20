<?php

use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = [
            ['id' => 5, 'name' => 'ANTIOQUIA'],
            ['id' => 8, 'name' => 'ATLÁNTICO'],
            ['id' => 11, 'name' => 'BOGOTÁ D.C.'],
            ['id' => 13, 'name' => 'BOLÍVAR'],
            ['id' => 15, 'name' => 'BOYACÁ'],
            ['id' => 17, 'name' => 'CALDAS'], 
            ['id' => 18, 'name' => 'CAQUETÁ'],
            ['id' => 19, 'name' => 'CAUCA'], 
            ['id' => 20, 'name' => 'CESAR'],
            ['id' => 23, 'name' => 'CÓRDOBA'], 
            ['id' => 25, 'name' => 'CUNDINAMARCA'],
            ['id' => 27, 'name' => 'CHOCÓ'], 
            ['id' => 41, 'name' => 'HUILA'],
            ['id' => 44, 'name' => 'LA GUAJIRA'], 
            ['id' => 47, 'name' => 'MAGDALENA'],
            ['id' => 50, 'name' => 'META'], 
            ['id' => 52, 'name' => 'NARIÑO'],
            ['id' => 54, 'name' => 'NORTE DE SANTANDER'], 
            ['id' => 63, 'name' => 'QUINDÍO'],
            ['id' => 66, 'name' => 'RISARALDA'],
            ['id' => 68, 'name' => 'SANTANDER'],
            ['id' => 70, 'name' => 'SUCRE'], 
            ['id' => 73, 'name' => 'TOLIMA'],
            ['id' => 76, 'name' => 'VALLE DEL CAUCA'], 
            ['id' => 81, 'name' => 'ARAUCA'],
            ['id' => 85, 'name' => 'CASANARE'], 
            ['id' => 86, 'name' => 'PUTUMAYO'],
            ['id' => 88, 'name' => 'SAN ANDRÉS'], 
            ['id' => 91, 'name' => 'AMAZONAS'],
            ['id' => 94, 'name' => 'GUAINÍA'], 
            ['id' => 95, 'name' => 'GUAVIARE'],
            ['id' => 97, 'name' => 'VAUPÉS'],
            ['id' => 99, 'name' => 'VICHADA']
        ];                 


        foreach ($departments as $department) {
          DB::table('departments')->insert(['id' => $department['id'], 'name' => $department['name']]);  
        }
    }
}
